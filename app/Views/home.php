<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<!-- code here.. -->


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    CoffeeShop Descrioon
                </h3>
            </div>

            <div class="card-body">
                <blockquote>
                    <p>CoffeeShop es una Prueba Tecnica de Desarrollo Web, hecha por Carlos Gutierrez.</p>

                    <p>Este proyecto esta construido con PHP usando Codeigniter4 y AdminLTE. <br /> 
                    El codigo fuente se encuentra disponible en: 
                    <a href="https://github.com/cgutierr3z/coffee-shop">https://github.com/cgutierr3z/coffee-shop</a></p>
                    
                    <small>2022/01/27 <cite title="Source Title">cg - dev</cite></small>
                </blockquote>
            </div>

        </div>

    </div>
</div>


<div class="row">
    <div class="col-lg-4 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= esc($countProductos) ?></h3>
                <p>Productos</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('productos') ?>" class="small-box-footer">M&aacute;s info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= esc($countCategorias) ?></h3>
                <p>Categorias</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('categorias') ?>" class="small-box-footer">M&aacute;s info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-4 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= esc($countVentas) ?></h3>
                <p>Ventas</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= base_url('ventas') ?>" class="small-box-footer">M&aacute;s info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>



<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>
<!-- write script here.. -->
<?= $this->endSection() ?>