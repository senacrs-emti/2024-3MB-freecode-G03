from flask import Flask, render_template, Response
import cv2
import mediapipe as mp
import sqlite3
from datetime import datetime

app = Flask(__name__)

# Inicializar captura de vídeo e bibliotecas
cap = cv2.VideoCapture(0)
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()
mp_drawing = mp.solutions.drawing_utils
conn = sqlite3.connect('biotipos.db', check_same_thread=False)
cursor = conn.cursor()

# Criar tabela se não existir
cursor.execute('''
    CREATE TABLE IF NOT EXISTS Biotipos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        biotipo TEXT,
        data TEXT
    )
''')

def calcular_proporcoes(landmarks):
    ombro_esq = landmarks[mp_pose.PoseLandmark.LEFT_SHOULDER.value]
    ombro_dir = landmarks[mp_pose.PoseLandmark.RIGHT_SHOULDER.value]
    quadril_esq = landmarks[mp_pose.PoseLandmark.LEFT_HIP.value]
    quadril_dir = landmarks[mp_pose.PoseLandmark.RIGHT_HIP.value]
    largura_ombros = ((ombro_dir.x - ombro_esq.x) ** 2 + (ombro_dir.y - ombro_esq.y) ** 2) ** 0.5
    largura_quadris = ((quadril_dir.x - quadril_esq.x) ** 2 + (quadril_dir.y - quadril_esq.y) ** 2) ** 0.5
    return largura_ombros, largura_quadris

def classificar_biotipo(largura_ombros, largura_quadris):
    relacao_ombro_quadril = largura_ombros / largura_quadris
    if relacao_ombro_quadril > 1.2:
        return "Medio"
    elif relacao_ombro_quadril < 1.0:
        return "Magro"
    else:
        return "Acima do Peso"

def armazenar_biotipo(biotipo):
    data_atual = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    cursor.execute('''
        INSERT INTO Biotipos (biotipo, data) VALUES (?, ?)
    ''', (biotipo, data_atual))
    conn.commit()

def gerar_stream():
    while cap.isOpened():
        ret, frame = cap.read()
        if not ret:
            break
        image_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        result = pose.process(image_rgb)
        if result.pose_landmarks:
            mp_drawing.draw_landmarks(frame, result.pose_landmarks, mp_pose.POSE_CONNECTIONS)
            largura_ombros, largura_quadris = calcular_proporcoes(result.pose_landmarks.landmark)
            biotipo = classificar_biotipo(largura_ombros, largura_quadris)
            armazenar_biotipo(biotipo)
            cv2.putText(frame, f"Biotipo: {biotipo}", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (0, 255, 0), 2)
        ret, buffer = cv2.imencode('.jpg', frame)
        frame = buffer.tobytes()
        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/video_feed')
def video_feed():
    return Response(gerar_stream(),
                    mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
