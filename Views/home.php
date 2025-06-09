<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --purple: #6a11cb;
            --blue: #2575fc;
        }

        /* Sobrescrevendo cores primárias do Bootstrap e definindo a fonte */
        body {
            --bs-primary-rgb: 106, 17, 203;
            /* Equivalente a --purple */
            --bs-secondary-rgb: 37, 117, 252;
            /* Equivalente a --blue */
            font-family: 'Poppins', sans-serif;
        }

        /* Classe para o gradiente de fundo */
        .bg-gradient-custom {
            background: var(--purple);
            background: linear-gradient(100deg, var(--purple), var(--blue));
        }

        /* Estilo para o botão com gradiente */
        .btn-gradient {
            background-image: linear-gradient(100deg, var(--purple), var(--blue));
            border: none;
            color: white;
            transition: transform 0.3s ease;
        }

        .btn-gradient:hover {
            transform: translateY(-3px);
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Ajustes de tipografia */
        .display-4 {
            font-weight: 700;
        }

        .lead {
            font-weight: 400;
        }

        /* Ajustes nos ícones */
        .feature-icon {
            font-size: 3rem;
            color: var(--purple);
        }

        .feature-icon.icon-blue {
            color: var(--blue);
        }

        /* Ajuste do card popular */
        .card.popular {
            border-width: 2px;
            transform: scale(1.02);
        }

        /* Ajustes no rodapé */
        .footer {
            background-color: #343a40;
            /* bg-dark do bootstrap */
        }

        .footer a {
            color: #adb5bd;
            /* text-secondary do bootstrap */
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #fff;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow-sm" style="--bs-bg-opacity: .9;">
        <div class="container">

            <a class="navbar-brand fw-bold text-primary" href="#">Finance</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="d-flex gap-2">
                    <a href="/controleFinanceiroPHP/login/" class="btn btn-outline-primary">Entrar</a>
                    <a href="/controleFinanceiroPHP/cadastro/" class="btn btn-gradient">Criar Conta</a>
                </div>
            </div>

        </div>
    </nav>

    <main>
        <section class="bg-gradient-custom text-white text-center py-5" id="inicio">
            <div class="container" style="padding-top: 5rem; padding-bottom: 2rem;">
                <h1 class="display-4">A clareza financeira que você sempre quis, agora ao seu alcance.</h1>
                <p class="lead col-md-8 mx-auto my-4">Organize suas finanças, planeje seus objetivos e tome decisões
                    mais inteligentes sem complicações. O <strong>Foco Financeiro</strong> automatiza o trabalho pesado
                    para você focar no que realmente importa: viver bem.</p>
                <a href="/controleFinanceiroPHP/cadastro/" class="btn btn-light btn-lg fw-bold">Comece Agora</a>

            </div>
        </section>

        <section class="py-5" id="funcionalidades">
            <div class="container">
                <h2 class="text-center mb-5">Tudo o que você precisa para ter total controle</h2>
                <div class="row g-4 text-center d-flex justify-content-center   ">
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body p-4">
                                <i class="bi bi-bank2 feature-icon mb-3"></i>
                                <h3 class="h5 fw-bold">Visão 360° das Contas</h3>
                                <p class="mb-0">Organize suas contas por categorias e salve a sua vida financeira</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow-sm h-100 border-0">
                            <div class="card-body p-4">
                                <i class="bi bi-pie-chart-fill feature-icon icon-blue mb-3"></i>
                                <h3 class="h5 fw-bold">Relatórios Visuais</h3>
                                <p class="mb-0">Entenda para onde seu dinheiro vai com a categorização e gráficos
                                    fáceis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 bg-light" id="depoimentos">
            <div class="container">
                <h2 class="text-center mb-5">O que nossos usuários dizem</h2>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <blockquote class="blockquote mb-0">
                                    <p>"Finalmente um app que é bonito e funciona! Em dois meses, eu já tinha uma visão
                                        clara de todos os meus gastos e consegui criar minha reserva de emergência."</p>
                                    <footer class="blockquote-footer mt-2">Ana B., <cite title="Cargo">Arquiteta</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <blockquote class="blockquote mb-0">
                                    <p>"O Foco Financeiro me deu a confiança que eu precisava para começar a investir.
                                        Entender meu fluxo de caixa foi o primeiro passo. Recomendo de olhos fechados."
                                    </p>
                                    <footer class="blockquote-footer mt-2">Carlos M., <cite
                                            title="Cargo">Desenvolvedor</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-custom text-white text-center py-5">
            <div class="container">
                <h2 class="display-5">Sua jornada para a tranquilidade financeira começa agora.</h2>
                <p class="lead col-md-8 mx-auto my-4">Chega de incertezas. Tome as rédeas do seu futuro financeiro com
                    uma ferramenta poderosa, intuitiva e segura.</p>
                <a href="/controleFinanceiroPHP/cadastro/" class="btn btn-light btn-lg fw-bold">Criar minha conta</a>
            </div>
        </section>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>