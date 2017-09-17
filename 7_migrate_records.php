<?php

function kama_change_cat ($change, $change_to){
    //7. Как перенести все записи wordpress из одной рубрики в другую?
    //тут помотрел))
    //https://wp-kama.ru/id_53/peremeschaem-kuchu-statey-v-druguyu-kategoriyu.html

    global $wpdb;
    $sql = "SELECT p.ID, p.post_title
	FROM $wpdb->posts p
		JOIN $wpdb->term_relationships rel ON ( p.ID = rel.object_id )
	WHERE rel.term_taxonomy_id = '$change'";
    $results = $wpdb->get_results($sql);
    if (!$results) return print "Ошибка! Вернулся пустой запрос.";
    echo "<ul>";
    foreach($results as $res) { $i++;
        $wpdb->query( "UPDATE $wpdb->term_relationships rr SET rr.term_taxonomy_id = '$change_to' WHERE rr.object_id = '{$res->ID}'" );
        echo "<li>{$i}. Обновленна запись с ИД: {$res->ID} ({$res->post_title})</li>";
    }
    echo "</ul>";
}
?>

пример использования
<?php kama_change_cat (1, 8); ?>
