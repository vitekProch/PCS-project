<div class="pagination">
    <a href="<?= $GLOBALS['__BASE_PATH__']?><?=$pageUrl?><?=$currentPage - 1?>" class="pagination-box-previos <?=($currentPage == 1) ? 'disabled' : ''?>" title="Předchozí strana">
        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/previous.png" alt="previous">
    </a>
    <div class="pagination-numbers">
        <?php foreach (range(1, $articleMaxPages) as $i): ?>
            <button class="pagination-number <?=($currentPage == $i) ? 'active' : ''?>" onclick="location.href='<?= $GLOBALS['__BASE_PATH__']?><?=$pageUrl?><?=$i?>'"><?=$i?></button>
        <?php endforeach; ?>
    </div>
    <a href="<?= $GLOBALS['__BASE_PATH__']?><?=$pageUrl?><?=$currentPage + 1?>" class="pagination-box-next <?=($currentPage == $articleMaxPages) || ($articleMaxPages == 1) ? 'disabled' : ''?>" title="Další strana">
        <img src="<?= $GLOBALS['__BASE_PATH__']?>images/icons/next.png" alt="next">
    </a>
</div>
