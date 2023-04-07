   <?php if (!empty($errors)) : ?>
   <div class="alert alert-danger">
       <?php foreach ($errors as $i => $error) : ?>

       <div><?= $error ?></div>


       <?php endforeach; ?>
   </div>
   <?php endif ?>
   <div class="p-2 shadow-sm rounded bg-white">
       <form action="" method="post" enctype="multipart/form-data">
           <div class="mb-3">
               <label class="form-label">Product Image</label>
               <input type="file" name="image" class="form-control">
               <?php if ($product['image']) : ?>
               <img src="/<?= $product['image'] ?>" alt="" class="mt-2">
               <?php endif; ?>
           </div>

           <div class="mb-3">
               <label class="form-label">Product Title</label>
               <input type="text" name="title" class="form-control" placeholder="Title.."
                   value="<?= $product['title'] ?>">
           </div>
           <div class="mb-3">
               <label class="form-label">Product Description</label>
               <textarea name="description" class="form-control"
                   placeholder="Description.."><?= $product['description'] ?></textarea>
           </div>
           <div class=" mb-3">
               <label class="form-label">Product price</label>
               <input type="number" name="price" class="form-control" step=".01" placeholder="Price.."
                   value="<?= $product['price'] ?>">
           </div>
           <button type=" submit" name="submit" class="btn btn-primary">Submit</button>
       </form>
   </div>