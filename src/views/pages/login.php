<?= $render('header_no_user', ['css' => 'config.css']); ?>

    <main>
        <form method="POST" class="input-area" action="<?=$base;?>/login">
         
            <div class="input-c">
                <?php if(!empty($flash)): ?>
                    <div class="flash"><?=$flash;?></div>
                <?php endif; ?>
                
                <label>
                    E-mail
                    <input type="email" name="email" />
                </label>
                <label>
                    Password
                    <input type="password" name="password" />
                </label>
                <button type="submit" class="button">Log In</button>
                <a href="<?=$base;?>/signup">Create New Account</a>    

            </div>

        </form>

    </main>
<?= $render('footer'); ?>