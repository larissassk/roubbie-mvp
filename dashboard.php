<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roubbie Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans:wght@400&display=swap" rel="stylesheet">
    <style>
        /* Estilos Gerais */
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .dashboard-container {
            padding: 20px;
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .card h2 {
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 15px;
            font-weight: 600;
            color: #333;
        }

        .profile {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .task-list {
            list-style: none;
            padding: 0;
        }

        .task-list li {
            margin: 10px 0;
            background: #f4f4f4;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn-popup {
            background: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-popup:hover {
            background: #45a049;
        }

        canvas {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'includes/header.php'; ?>

    <div class="dashboard-container">
        <main class="card-grid">
            <div class="card">
                <h2>Status</h2>
                <div class="profile">
                    <img src="https://cdn-icons-png.flaticon.com/512/3106/3106921.png" alt="Foto de perfil" class="profile-img">
                    <p>Ayla</p>
                </div>
            </div>

            <div class="card">
                <h2>Tarefas Pendentes</h2>
                <ul class="task-list">
                    <li>Exemplo de tarefa 1</li>
                    <li>Exemplo de tarefa 2</li>
                </ul>
            </div>

            <div class="card">
                <h2>Agenda</h2>
                <button class="btn-popup" aria-label="Ver Agenda" onclick="showPopup('agenda')">Ver Agenda</button>
            </div>

            <div class="card">
                <h2>Hobbies Praticados</h2>
                <p>Você praticou 5 horas esta semana!</p>
            </div>

            <div class="card">
                <h2>Gasto de Tempo</h2>
                <canvas id="timeChart" aria-label="Gráfico de Gasto de Tempo"></canvas>
            </div>

            <div class="card">
                <h2>Resumo Semanal</h2>
                <p>Você completou 80% das suas metas!</p>
            </div>
        </main>
    </div>

    <script src="js/chart.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById("timeChart").getContext("2d");
            new Chart(ctx, {
                type: "doughnut",
                data: {
                    labels: ["Hobbies", "Trabalho", "Descanso"],
                    datasets: [{
                        data: [10, 50, 40],
                        backgroundColor: ["#4CAF50", "#FF9800", "#FFC107"],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                font: {
                                    size: 14
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
