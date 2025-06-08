<div class="d-flex justify-content-center align-items-center min-vh-100" >
<div class="container my-5">
    <div class="row justify-content-center">
        <?php foreach ($planos as $plano): ?>
            <div class="col-md-4 mb-4 ">
                <form method="post" action="/controleFinanceiroPHP/planos/escolhaPlano">
                    <input type="hidden" name="planoId" value="<?=$plano->Id?>">
                    <div class="card p-3 shadow-sm h-100 border-0" style="min-height: 300px;">
                        <div class="card-body text-center">
                            <h3 class="card-title mb-3"><?=$plano->Descricao?></h3>
                            <p class="mb-1"><strong>Limite Lançamento:</strong> <?=$plano->Limite_Lancamento?></p>
                            <p class="mb-1"><strong>Limite Metas:</strong> <?=$plano->Limite_Metas?></p>
                            <p class="mb-3"><strong>Preço:</strong> R$ <?=number_format($plano->Preco, 2, ',', '.')?></p>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Escolher</button>
                    </div>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>