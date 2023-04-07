<div class="container py-4">
    <div class="row d-flex justify-content-center align-items-center">
        <p>
            <a href="/" class="btn btn-secondary">Go Back to products</a>
        </p>
        <div class="col-sm-12 col-md-6 p-2 shadow-sm rounded bg-white">
            <h1 class="text-center"><?= $product['title'] ?></h1>
            <div class="d-flex justify-content-center">
                <img src="/<?= $product['image'] ?>" alt="" class="w-25">
            </div>
            <h3 class="mt-2 text-danger">$<?= $product['price'] ?></h3>
            <p class="text-muted text-14"><?= $product['description'] ?: 'No description' ?>
            </p>
        </div>
    </div>
</div>