<?php
/**
 * Two Columns Secondary Block Patterns Template
 *
 * @package aquila-features
 */


$fields = get_fields(get_option('page_on_front'));

function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
{
    $sort_col = array();
    foreach ($arr as $key => $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

array_sort_by_column($fields['people'], 'fam');

?>

<div class='people_container'>
    <h3>Поэты</h3>
    <?php
    echo '<ul>';

    foreach ($fields['people'] as $k => $v) {
        if ($v['category'] == 'poet') {
            echo '<li>';
            echo '<a href="' . $v['lnk'] . '" title="' . $v['fam'] . ' ' . $v['imya_otchestvo'] . '" traget="_blank">';
            echo '<img src="' . $v['img']['url'] . '" alt="' . $v['fam'] . ' ' . $v['imya_otchestvo'] . '">';
            echo '<b>' . $v['fam'] . '</b>';
            echo '<i>' . $v['imya_otchestvo'] . '</i>';
            echo '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
    ?>
    <h3>Политики</h3>
    <?php
    echo '<ul>';

    foreach ($fields['people'] as $k => $v) {
        if ($v['category'] == 'politik') {
            echo '<li>';
            echo '<a href="' . $v['lnk'] . '" title="' . $v['fam'] . ' ' . $v['imya_otchestvo'] . '" traget="_blank">';
            echo '<img src="' . $v['img']['url'] . '" alt="' . $v['fam'] . ' ' . $v['imya_otchestvo'] . '">';
            echo '<b>' . $v['fam'] . '</b>';
            echo '<i>' . $v['imya_otchestvo'] . '</i>';
            echo '</a>';
            echo '</li>';
        }
    }
    echo '</ul>';
    ?>
</div>

