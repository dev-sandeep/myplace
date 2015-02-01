<!-- Just a Blank template with place holders, this can be used on any page -->
<!--markup header-->
<div class="wide_layout relative">
    <header role="banner" class="type_4">
        <?php if (isset($nav)): ?>
                <?= $nav; ?>
            <?php endif; ?>
    </header>
    <section id="main">
        <section id="content" class="left main-content min_ht_600">
            <?php if (isset($content)): ?>
                    <?= $content; ?>
                <?php endif; ?>
        </section>
        <section id="right" class="right">
            <?php if (isset($right)): ?>
                    <?= $right; ?>
                <?php endif; ?>
        </section>
    </section>
    <footer>
        <?php if (isset($footer)): ?>
                <?= $footer; ?>
            <?php endif; ?>
    </footer>
</div>
<?php if (isset($side_stuff)): ?>
        <?= $side_stuff; ?>
    <?php endif; ?>
