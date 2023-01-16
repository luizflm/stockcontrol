<?= $render('header_no_user', ['css' => 'config.css']); ?>

    <main>
        <form method="POST" class="input-area" action="<?=$base;?>/add">

            <div class="input-c">
                <?php if(!empty($flash)): ?>
                    <div class="flash"><?=$flash;?></div>
                <?php endif; ?>

                <label>
                    Name
                    <input type="text" name="name" />
                </label>
                <label>
                    Price
                    <input type="number" name="price" step="0.01" />
                </label>
                <label>
                    Producer
                    <input type="text" name="company" />
                </label>
                <label>
                    Stock
                    <input type="number" name="stock" />
                </label>
                <label>
                    Max. Stock
                    <input type="number" name="max_stock" />
                </label>
                <label>
                    Min. Stock
                    <input type="number" name="min_stock" />
                </label>

                <button type="submit" class="button">Add Product</button>   
                 
            </div>

        </form>

    </main>

<?= $render('footer'); ?>