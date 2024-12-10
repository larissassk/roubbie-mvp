<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/quiz.css">
</head>

<body>
    <div class="wrapper">
        <svg>
            <text x="50%" y="50%" dy=".35em" text-anchor="middle">
                QuizRoub
            </text>
        </svg>
    </div>

    <!-- Botão de início do quiz -->
    <div class="start_btn"><button>Bora!</button></div>

    <!-- Caixa de informações -->
    <div style="color: white;" class="info_box">
        <div style="color: white;" class="info-title"><span>Regras do Quiz</span></div>
        <div style="color: white;" class="info-list">
            <div class="info">Responda 10 perguntas rápidas.</div>
            <div class="info">As perguntas ajudam a entender sua personalidade.</div>
            <div class="info">Ao final, você receberá sugestões de hobbies.</div>
        </div>
        <div class="buttons">
            <button class="quit">Sair</button>
            <button class="restart">Continuar</button>
        </div>
    </div>

    <!-- Caixa do Quiz -->
    <div style="color: black;" class="quiz_box">
        <header>
            <div class="title">Descubra Mais Sobre Você!</div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text"></div>
            <div class="option_list"></div>
        </section>
        <footer>
            <div class="total_que"></div>
            <button class="next_btn">Próxima</button>
        </footer>
    </div>

    <!-- Caixa de resultado -->
    <div style="color: white;" class="result_box">
        <div class="icon">
            <i class="fas fa-star"></i>
        </div>
        <div class="complete_text">Você terminou o Quiz!</div>
        <div class="score_text">Aqui está o que descobrimos sobre você:</div>
        <div class="buttons">
            <button class="restart">Refazer Quiz</button>
            <button class="quit">Sair</button>
        </div>
    </div>

    <script>
        // Array das perguntas, sem respostas corretas ou erradas
        let questions = [{
                numb: 1,
                question: "Você prefere atividades ao ar livre ou em casa?",
                options: [
                    "Ao ar livre",
                    "Em casa",
                    "Depende do dia",
                    "Nenhum dos dois"
                ]
            },
            {
                numb: 2,
                question: "O que você mais valoriza em um hobby?",
                options: [
                    "Criatividade",
                    "Relaxamento",
                    "Adrenalina",
                    "Aprendizado"
                ]
            },

            {
                numb: 3,
                question: "Você prefere atividades ao ar livre ou em casa?",
                options: [
                    "Ao ar livre",
                    "Em casa",
                    "Depende do dia",
                    "Nenhum dos dois"
                ]
            },
            // Adicione mais perguntas aqui...
        ];

        const start_btn = document.querySelector(".start_btn button");
        const info_box = document.querySelector(".info_box");
        const quiz_box = document.querySelector(".quiz_box");
        const result_box = document.querySelector(".result_box");
        const option_list = document.querySelector(".option_list");
        const next_btn = document.querySelector("footer .next_btn");

        let que_count = 0;

        start_btn.onclick = () => {
            info_box.classList.add("activeInfo");
        };

        info_box.querySelector(".buttons .restart").onclick = () => {
            info_box.classList.remove("activeInfo");
            quiz_box.classList.add("activeQuiz");
            showQuestions(0);
        };

        next_btn.onclick = () => {
            if (que_count < questions.length - 1) {
                que_count++;
                showQuestions(que_count);
            } else {
                quiz_box.classList.remove("activeQuiz");
                result_box.classList.add("activeResult");
            }
        };

        function showQuestions(index) {
            const que_text = document.querySelector(".que_text");
            const options = questions[index].options.map(option => `<div class="option"><span>${option}</span></div>`).join("");
            que_text.innerHTML = `<span>${questions[index].numb}. ${questions[index].question}</span>`;
            option_list.innerHTML = options;

            const allOptions = option_list.querySelectorAll(".option");
            allOptions.forEach(option => {
                option.onclick = () => {
                    // Desabilita todas as opções após clicar em uma
                    allOptions.forEach(opt => opt.classList.add("disabled"));

                    // Passa automaticamente para a próxima questão
                    if (que_count < questions.length - 1) {
                        que_count++;
                        showQuestions(que_count);
                    } else {
                        quiz_box.classList.remove("activeQuiz");
                        result_box.classList.add("activeResult");
                    }
                };
            });
        }

        // Ao clicar no botão restartQuiz (Refazer Quiz)
        const restart_quiz = document.querySelector(".result_box .restart");
        restart_quiz.onclick = () => {
            quiz_box.classList.add("activeQuiz");
            result_box.classList.remove("activeResult");
            que_count = 0;
            showQuestions(que_count);
            next_btn.classList.remove("show");
        };

        // Ao clicar no botão quitQuiz (Sair)
        const quit_quiz = document.querySelector(".result_box .quit");
        quit_quiz.onclick = () => {
            window.location.href = 'dashboard.php'; // Redireciona para a página inicial
        };
    </script>
</body>

</html>