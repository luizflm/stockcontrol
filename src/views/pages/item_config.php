<?= $render('header_no_user', ['css' => 'item_config.css']); ?>

    <main>

        <form method="POST" class="input-area" action="<?=$base;?>/edit_item">

            <div class="input-c">
                <?php if(!empty($flash)): ?>
                    <div class="flash"><?=$flash;?></div>
                <?php endif; ?>

                <div class="item-config">

                    <div class="item-config-left">
                        <input type="hidden" name="id" value="<?=$item->id;?>">

                        <label>
                            Name
                            <input type="text" name="name" value="<?=$item->name;?>" />
                        </label>
                        <label>
                            Price
                            <input type="number" name="price" step="0.01" min="0" value="<?=$item->price;?>"/>
                        </label>
                        <label>
                            Producer
                            <input type="text" name="company" value="<?=$item->company;?>"/>
                        </label>
                    </div>

                    <div class="item-config-right">
                        <label>
                            Stock
                            <input type="number" name="stock" min="0" value="<?=$item->stock?>" />
                        </label>
                        <label>
                            Max. Stock
                            <input type="number" name="max_stock" min="0" value="<?=$item->max_stock;?>" />
                        </label>
                        <label>
                            Min. Stock
                            <input type="number" name="min_stock" min="0" value="<?=$item->min_stock;?>" />
                        </label>

                    </div>

                </div>

                <button type="submit" class="button">Save Changes</button>         
            </div>

        </form>

    </main>

<?= $render('footer'); ?>
