<div class="container py-4">
    <h1>Products CRUD</h1>
    <p class="text-muted text-14">
        <a href="/products/create" class="btn btn-sm btn-success">Create Product</a>
    </p>

    <form action="">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search products..."
                value="<?= $search ?>">
            <button class=" btn btn-outline-secondary" type="submit">Search</button>
        </div>

    </form>

    <div class="p-2 shadow-sm rounded bg-white">
        <div class="table table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">Create Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <?php if ($products) : ?>
                <tbody>
                    <?php foreach ($products as $i => $product) : ?>
                    <tr>
                        <th scope="row"><?= $i + 1 ?></th>
                        <td><a href="/products/view?id=<?= $product['id'] ?>"><img src="/<?= $product['image'] ?>"
                                    alt="" class="avatar"></a>
                        </td>
                        <td><?= $product['title'] ?></td>
                        <td>$<?= $product['price'] ?></td>
                        <td><?= $product['create_date'] ?></td>
                        <td>
                            <a href="/products/view?id=<?= $product['id'] ?>"
                                class="btn btn-sm btn-outline-success">View</a>
                            <a href="/products/update?id=<?= $product['id'] ?>"
                                class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="/products/delete" method="post" class="d-inline">
                                <input name="id" type="hidden" value="<?= $product['id'] ?>">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <?php endforeach; ?>
                    <?php else : ?>

                </tbody>
            </table>

        </div>

        <h1 class="text-center text-danger">No products</p>
            <?php endif; ?>
    </div>
</div>