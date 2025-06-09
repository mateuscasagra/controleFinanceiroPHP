<div class="col-auto min-vh-100 bg-dark">
    <div class="pt-4 pb-1 px-2">
        <a href="" class="text-white text-decoration-none">
            <i class="fa-solid fs-2 fa-coins me-2"></i>
            <span class="fs-4 d-none d-sm-inline">Finance</span>
        </a>
    </div>
    <hr class="text-white">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <form action="/controleFinanceiroPHP/dashboard" method="post">
                <button class="nav-link text-white ">
                    <i class="fa-solid fa-gauge me-2"></i>
                    <span class="d-none d-sm-inline">Dashboard</span>
                </button>
            </form>

        </li>
        <li class="nav-item">
            <form action="/controleFinanceiroPHP/movimentacao" method="post">
                <button class="nav-link text-white ">
                    <i class="fa-solid fa-file-invoice-dollar me-2"></i>
                    <span class="d-none d-sm-inline">Movimentação</span>
                </button>
            </form>
        </li>
        <li class="nav-item">
            <form action="/controleFinanceiroPHP/categoria" method="post">
                <button class="nav-link text-white ">
                    <i class="fa-solid fa-layer-group me-2"></i>
                    <span class="d-none d-sm-inline">Categorias</span>
                </button>
            </form>
        </li>
        <li class="nav-item">
            <form action="/controleFinanceiroPHP/pagamento" method="post">
                <button class="nav-link text-white ">
                    <i class="fa-solid fa-money-check-dollar me-2"></i>
                    <span class="d-none d-sm-inline">Formas de pagemento</span>
                </button>
            </form>
        </li>
        <li class="nav-item">
            <form action="/controleFinanceiroPHP/home/sair" method="post">
                <button class="nav-link text-white ">
                    <i class="fa-solid fa-right-from-bracket me-2"></i>
                    <span class="d-none d-sm-inline">Sair</span>
                </button>
            </form>
        </li>

    </ul>

</div>