from flask import Flask, render_template, Response
import cv2
import mediapipe as mp

app = Flask(__name__)

# Inicializando MediaPipe Pose
mp_pose = mp.solutions.pose
pose = mp_pose.Pose()
mp_drawing = mp.solutions.drawing_utils

def avaliar_proporcoes(pontos):
    try:
        ombros = pontos[mp_pose.PoseLandmark.RIGHT_SHOULDER].x - pontos[mp_pose.PoseLandmark.LEFT_SHOULDER].x
        cintura = pontos[mp_pose.PoseLandmark.RIGHT_HIP].x - pontos[mp_pose.PoseLandmark.LEFT_HIP].x
        altura = pontos[mp_pose.PoseLandmark.NOSE].y - pontos[mp_pose.PoseLandmark.LEFT_ANKLE].y

        relacao = cintura / altura

        if relacao > 0.5:
            return "Acima do peso"
        elif 0.4 <= relacao <= 0.5:
            return "Peso médio"
        else:
            return "Magro"
    except KeyError:
        return "Não foi possível calcular proporções"

def gerar_frames():
    cap = cv2.VideoCapture(0)
    while True:
        success, frame = cap.read()
        if not success:
            break

        # Converta para RGB
        frame_rgb = cv2.cvtColor(frame, cv2.COLOR_BGR2RGB)
        results = pose.process(frame_rgb)

        if results.pose_landmarks:
            mp_drawing.draw_landmarks(frame, results.pose_landmarks, mp_pose.POSE_CONNECTIONS)
            classificacao = avaliar_proporcoes(results.pose_landmarks.landmark)
            cv2.putText(frame, f"Classificacao: {classificacao}", (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 1, (255, 0, 0), 2)

        ret, buffer = cv2.imencode('.jpg', frame)
        frame = buffer.tobytes()

        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/video_feed')
def video_feed():
    return Response(gerar_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

if __name__ == "__main__":
    app.run(debug=True)
