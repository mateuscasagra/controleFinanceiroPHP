<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5 mx-auto" style="max-width: 600px;">
            <div class="card-body p-0">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-black">Crie sua conta!</h1>
                        </div>
                        <form method="post" action="cadastro/cadastro" class="user">
                            <div class="form-group row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="nome" placeholder="Nome" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="sobrenome" placeholder="Sobrenome" required>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control form-control-user" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control form-control-user" name="senha" placeholder="Senha" required>
                            </div>
                            <div class="form-group row mb-3">
                                <button type="submit" class="btn btn-primary btn-user btn-block fw-bold">Criar conta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
