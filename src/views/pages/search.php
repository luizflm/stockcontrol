<?= $render('header', ['loggedUser' => $loggedUser]); ?>

    <div class="stock-bar">

        <div class="stock-add">
            <a href="<?=$base;?>/add">Add a product</a>
        </div>

        <form method="GET" action="<?=$base;?>/search">
            <div class="stock-search">
                <input type="search" name="search" placeholder="Search (product, item...)">
            </div>   
        </form>

    </div>

    <main>

        <section class="stock">
    
            <div class="stock-info"> <!-- stock-info container -->
                <div class="stock-info-item name">Name</div>
                <div class="stock-info-item price">Price</div>
                <div class="stock-info-item producer">Producer</div>
                <div class="stock-info-item atual-stock">Atual Stock</div>
                <div class="stock-info-item max-stock">Max. Stock</div>
                <div class="stock-info-item min-stock">Min. Stock</div>
                <div class="stock-info-item actions">Actions</div>
            </div>

            <div class="stock-item-area"> <!-- stock-item-area container -->
                <?php foreach($products as $product): ?>
                    <div class="stock-item"> <!-- stock-item container-->
                        <div class="stock-item-name"><?=$product->name;?></div>
                        <div class="stock-item-price">$ <?=$product->price?></div>
                        <div class="stock-item-producer"><?=$product->company;?></div>
                        <div class="stock-item-atual-stock"><?=$product->stock;?></div>
                        <div class="stock-item-max-stock"><?=$product->max_stock;?></div>
                        <div class="stock-item-min-stock"><?=$product->min_stock;?></div>
                        <div class="stock-item-actions"> 
                            <a href="<?=$base;?>/edit_item/<?=$product->id;?>" class="stock-item-action edit">Edit</a>
                           
                            <a href="<?=$base;?>/delete_item/<?=$product->id;?>" class="stock-item-action delete" onclick="confirm('Are you sure you want to delete?')">Delete</a>
                        </div>
                    </div>
                <?php endforeach; ?>
           
            </div>

        </section>

    </main>

<?= $render('footer'); ?>