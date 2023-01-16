<?= $render('header_no_user', ['css' => 'config.css']); ?>

    <main>

        <form method="POST" class="input-area" action="<?=$base;?>/edit_user" >
            
            <div class="input-c">
                <?php if(!empty($flash)): ?>
                    <div class="flash"><?=$flash;?></div>
                <?php endif; ?>

                <input type="hidden" name="id" value="<?=$user->id?>" />

                <label>
                    E-mail
                    <input type="email" name="email" value="<?=$user->email?>" />
                </label>
                <label>
                    Name
                    <input type="text" name="name" value="<?=$user->name?>" />
                </label>
                <label>
                    Password
                    <input type="password" name="password" />
                </label>
                <label>
                    Confirm Password
                    <input type="password" name="password_confirm" />
                </label>

                <button type="submit" class="button">Save Changes</button>         
            </div>

        </form>

    </main>

<?= $render('footer'); ?>