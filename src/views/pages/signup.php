<?= $render('header_no_user',['css' => 'config.css']); ?>

    <main>
        <form method="POST" class="input-area" action="<?=$base;?>/signup">

            <div class="input-c">
                <?php if(!empty($flash)): ?>
                    <div class="flash"><?=$flash;?></div>
                <?php endif; ?>

                <label>
                    E-mail
                    <input type="email" name="email" />
                </label>
                <label>
                    Name
                    <input type="text" name="name" />
                </label>
                <label>
                    Password
                    <input type="password" name="password" />
                </label>

                <button type="submit" class="button">Sign Up</button>   
                
                <a href="<?=$base;?>/login">Have an account? Log in</a>   
            </div>

        </form>

    </main>

<?= $render('footer'); ?>