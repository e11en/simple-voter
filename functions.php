<?php

if(isset($_POST['action'])) {
    switch($_POST['action']) {
        case 'vote':
            echo json_encode(saveVote());
        case 'getData':
            echo json_encode(getData());
    }
}

if(isset($_GET['reset']) && $_GET['reset'] == 1) {
    setupDefault();
    echo "Setup complete, all votes are returned to 0";
}

function saveVote(){
    $paintingId = $_POST['id'];
    $data = unserialize(file_get_contents('paintings.txt'));
    $key = array_search($paintingId, array_column($data, 'id'));
    $data[$key]['votes'] = $data[$key]['votes'] + 1;
    file_put_contents('paintings.txt',serialize($data));

    return 1;
}

function getData() {
    $data = unserialize(file_get_contents('paintings.txt'));
    
    if(isset($_POST['sort']) && $_POST['sort'] == 'votes') {
        array_sort_by_column($data, 'votes');
    }
    
    return $data;
}

function array_sort_by_column(&$arr, $col, $dir = SORT_DESC) {
    $sort_col = array();
    foreach ($arr as $key=> $row) {
        $sort_col[$key] = $row[$col];
    }

    array_multisort($sort_col, $dir, $arr);
}

function setupDefault() {
    $paintings = [
        [ 'id' => '4243764', 'name' => '1 x 1 - A Walk In The Woods',  'votes' => 0 ],
        [ 'id' => '4243772', 'name' => '1 x 10 - Mountain Lake',  'votes' => 0 ],
        [ 'id' => '4243773', 'name' => '1 x 11 - Winter Glow',  'votes' => 0 ],
        [ 'id' => '4243774', 'name' => '1 x 12 - Snow Fall',  'votes' => 0 ],
        [ 'id' => '4243776', 'name' => '1 x 13 - Final Reflections',  'votes' => 0 ],
        [ 'id' => '2115121', 'name' => '1 x 2 - Mt McKinley',  'votes' => 0 ],
        [ 'id' => '4243765', 'name' => '1 x 3 - Ebony Sunset',  'votes' => 0 ],
        [ 'id' => '4243766', 'name' => '1 x 4 - Winter Mist',  'votes' => 0 ],
        [ 'id' => '4243767', 'name' => '1 x 5 - Quiet Stream',  'votes' => 0 ],
        [ 'id' => '4243768', 'name' => '1 x 6 - Winter Moon',  'votes' => 0 ],
        [ 'id' => '4243769', 'name' => '1 x 7 - Autumn Mountain',  'votes' => 0 ],
        [ 'id' => '4243770', 'name' => '1 x 8 - Peaceful Valley',  'votes' => 0 ],
        [ 'id' => '4243771', 'name' => '1 x 9 - Seascape',  'votes' => 0 ],
        [ 'id' => '1641811', 'name' => '10 x 1 - Towering Peaks',  'votes' => 0 ],
        [ 'id' => '1641901', 'name' => '10 x 10 - Ocean Sunset',  'votes' => 0 ],
        [ 'id' => '1641911', 'name' => '10 x 11 - Triple View',  'votes' => 0 ],
        [ 'id' => '1641921', 'name' => '10 x 12 - Winter Frost',  'votes' => 0 ],
        [ 'id' => '1641931', 'name' => '10 x 13 - Lakeside Cabin',  'votes' => 0 ],
        [ 'id' => '1641821', 'name' => '10 x 2 - Cabin at Sunset',  'votes' => 0 ],
        [ 'id' => '1641831', 'name' => '10 x 3 - Twin Falls',  'votes' => 0 ],
        [ 'id' => '1641841', 'name' => '10 x 4 - Secluded Bridge',  'votes' => 0 ],
        [ 'id' => '1641851', 'name' => '10 x 5 - Ocean Breeze',  'votes' => 0 ],
        [ 'id' => '1641861', 'name' => '10 x 6 - Autumn Woods',  'votes' => 0 ],
        [ 'id' => '1641871', 'name' => '10 x 7 - Winter Solitude',  'votes' => 0 ],
        [ 'id' => '1641881', 'name' => '10 x 8 - Golden Sunset',  'votes' => 0 ],
        [ 'id' => '1641891', 'name' => '10 x 9 - Mountain Oval',  'votes' => 0 ],
        [ 'id' => '1595421', 'name' => '11 x 1 - Mountain Stream',  'votes' => 0 ],
        [ 'id' => '1595511', 'name' => '11 x 10 - Sunset over the Waves',  'votes' => 0 ],
        [ 'id' => '1595521', 'name' => '11 x 11 - Golden Glow',  'votes' => 0 ],
        [ 'id' => '1595531', 'name' => '11 x 12 - Roadside Barn',  'votes' => 0 ],
        [ 'id' => '1595541', 'name' => '11 x 13 - Happy Accident',  'votes' => 0 ],
        [ 'id' => '1595431', 'name' => '11 x 2 - Country Cabin',  'votes' => 0 ],
        [ 'id' => '1595441', 'name' => '11 x 3 - Daisy Delight',  'votes' => 0 ],
        [ 'id' => '1595451', 'name' => '11 x 4 - Hidden Stream',  'votes' => 0 ],
        [ 'id' => '1595461', 'name' => '11 x 5 - Towering Glacier',  'votes' => 0 ],
        [ 'id' => '1595471', 'name' => '11 x 6 - Oval Barn',  'votes' => 0 ],
        [ 'id' => '1595481', 'name' => '11 x 7 - Lakeside Path',  'votes' => 0 ],
        [ 'id' => '1595491', 'name' => '11 x 8 - Sunset Oval',  'votes' => 0 ],
        [ 'id' => '1595501', 'name' => '11 x 9 - Winter Barn',  'votes' => 0 ],
        [ 'id' => '1595551', 'name' => '12 x 1 - Golden Knoll',  'votes' => 0 ],
        [ 'id' => '1595641', 'name' => '12 x 10 - Mountain at Sunset',  'votes' => 0 ],
        [ 'id' => '1595651', 'name' => '12 x 11 - Soft Mountain Glow',  'votes' => 0 ],
        [ 'id' => '1595661', 'name' => '12 x 12 - Mountain in an Oval',  'votes' => 0 ],
        [ 'id' => '1595671', 'name' => '12 x 13 - Winter Mountain',  'votes' => 0 ],
        [ 'id' => '1595561', 'name' => '12 x 2 - Mountain Reflections',  'votes' => 0 ],
        [ 'id' => '1595571', 'name' => '12 x 3 - Secluded Mountain',  'votes' => 0 ],
        [ 'id' => '1595581', 'name' => '12 x 4 - Bright Autumn Trees',  'votes' => 0 ],
        [ 'id' => '1595591', 'name' => '12 x 5 - Black Seascape',  'votes' => 0 ],
        [ 'id' => '1595601', 'name' => '12 x 6 - Steep Mountains',  'votes' => 0 ],
        [ 'id' => '1595611', 'name' => '12 x 7 - Quiet Mountains River',  'votes' => 0 ],
        [ 'id' => '1595621', 'name' => '12 x 8 - Evening Waterfall',  'votes' => 0 ],
        [ 'id' => '1595631', 'name' => '12 x 9 - Tropical Seascape',  'votes' => 0 ],
        [ 'id' => '902661', 'name' => '13 x 1 - Rolling Hills',  'votes' => 0 ],
        [ 'id' => '902751', 'name' => '13 x 10 - Mountain Summit',  'votes' => 0 ],
        [ 'id' => '902761', 'name' => '13 x 11 - Cabin Hideaway',  'votes' => 0 ],
        [ 'id' => '902771', 'name' => '13 x 12 - Oval Essence',  'votes' => 0 ],
        [ 'id' => '902781', 'name' => '13 x 13 - Lost Lake',  'votes' => 0 ],
        [ 'id' => '902671', 'name' => '13 x 2 - Frozen Solitude',  'votes' => 0 ],
        [ 'id' => '902681', 'name' => '13 x 3 - Meadow Brook',  'votes' => 0 ],
        [ 'id' => '902691', 'name' => '13 x 4 - Evening at Sunset',  'votes' => 0 ],
        [ 'id' => '902701', 'name' => '13 x 5 - Mountain View',  'votes' => 0 ],
        [ 'id' => '902711', 'name' => '13 x 6 - Hidden Creek',  'votes' => 0 ],
        [ 'id' => '902721', 'name' => '13 x 7 - Peaceful Haven',  'votes' => 0 ],
        [ 'id' => '902731', 'name' => '13 x 8 - Mountain Exhibition',  'votes' => 0 ],
        [ 'id' => '902741', 'name' => '13 x 9 - Emerald Waters',  'votes' => 0 ],
        [ 'id' => '727921', 'name' => '14 x 1 - Distant Mountains',  'votes' => 0 ],
        [ 'id' => '902871', 'name' => '14 x 10 - Surprising Falls',  'votes' => 0 ],
        [ 'id' => '902881', 'name' => '14 x 11 - Shadow Pond',  'votes' => 0 ],
        [ 'id' => '902891', 'name' => '14 x 12 - Misty Forest Oval',  'votes' => 0 ],
        [ 'id' => '902901', 'name' => '14 x 13 - Natural Wonder',  'votes' => 0 ],
        [ 'id' => '902791', 'name' => '14 x 2 - Meadow Brook Surprise',  'votes' => 0 ],
        [ 'id' => '902801', 'name' => '14 x 3 - Mountain Moonlight Oval',  'votes' => 0 ],
        [ 'id' => '902811', 'name' => '14 x 4 - Snowy Solitude',  'votes' => 0 ],
        [ 'id' => '902821', 'name' => '14 x 5 - Mountain River',  'votes' => 0 ],
        [ 'id' => '902831', 'name' => '14 x 6 - Graceful Mountains',  'votes' => 0 ],
        [ 'id' => '902841', 'name' => '14 x 7 - Windy Waves',  'votes' => 0 ],
        [ 'id' => '902851', 'name' => '14 x 8 - On a Clear Day',  'votes' => 0 ],
        [ 'id' => '902861', 'name' => '14 x 9 - Riverside Escape Oval',  'votes' => 0 ],
        [ 'id' => '306614', 'name' => '15 x 1 - Splendor of Winter',  'votes' => 0 ],
        [ 'id' => '422650', 'name' => '15 x 10 - Forest Down Oval',  'votes' => 0 ],
        [ 'id' => '422651', 'name' => '15 x 11 - Pathway to Autumn',  'votes' => 0 ],
        [ 'id' => '422652', 'name' => '15 x 12 - Deep Forest Lake',  'votes' => 0 ],
        [ 'id' => '422653', 'name' => '15 x 13 - Christmas Eve Snow',  'votes' => 0 ],
        [ 'id' => '306615', 'name' => '15 x 2 - Colors of Nature',  'votes' => 0 ],
        [ 'id' => '422639', 'name' => '15 x 3 - Grandpa\'s Barn',  'votes' => 0 ],
        [ 'id' => '422640', 'name' => '15 x 4 - Peaceful Reflections',  'votes' => 0 ],
        [ 'id' => '422642', 'name' => '15 x 5 - Hidden Winter Moon Oval',  'votes' => 0 ],
        [ 'id' => '422644', 'name' => '15 x 6 - Waves of Wonder',  'votes' => 0 ],
        [ 'id' => '422645', 'name' => '15 x 7 - Cabin by the Pond',  'votes' => 0 ],
        [ 'id' => '422647', 'name' => '15 x 8 - Fall Stream',  'votes' => 0 ],
        [ 'id' => '422649', 'name' => '15 x 9 - Spring Time Mountain Lake',  'votes' => 0 ],
        [ 'id' => '379637', 'name' => '16 x 1 - Two Seasons',  'votes' => 0 ],
        [ 'id' => '379646', 'name' => '16 x 10 - That Time Of Year',  'votes' => 0 ],
        [ 'id' => '379647', 'name' => '16 x 11 - Waterfall Wonder',  'votes' => 0 ],
        [ 'id' => '379648', 'name' => '16 x 12 - Mighty Mountain Lake',  'votes' => 0 ],
        [ 'id' => '379649', 'name' => '16 x 13 - Wooded Stream Oval',  'votes' => 0 ],
        [ 'id' => '379638', 'name' => '16 x 2 - Nestled Cabin',  'votes' => 0 ],
        [ 'id' => '379639', 'name' => '16 x 3 - Wintertime Discovery',  'votes' => 0 ],
        [ 'id' => '379640', 'name' => '16 x 4 - Mountain Mirage Wood Shape',  'votes' => 0 ],
        [ 'id' => '379641', 'name' => '16 x 5 - Double Oval Fantasy',  'votes' => 0 ],
        [ 'id' => '379642', 'name' => '16 x 6 - Contemplative Lady',  'votes' => 0 ],
        [ 'id' => '379643', 'name' => '16 x 7 - Deep Woods',  'votes' => 0 ],
        [ 'id' => '379644', 'name' => '16 x 8 - High Tide',  'votes' => 0 ],
        [ 'id' => '379645', 'name' => '16 x 9 - Barn In Snow Oval',  'votes' => 0 ],
        [ 'id' => '402662', 'name' => '17 x 1 - Golden Mist Oval',  'votes' => 0 ],
        [ 'id' => '402671', 'name' => '17 x 10 - Old Country Mill',  'votes' => 0 ],
        [ 'id' => '402672', 'name' => '17 x 11 - Morning Walk',  'votes' => 0 ],
        [ 'id' => '402673', 'name' => '17 x 12 - Nature\'s Splendor',  'votes' => 0 ],
        [ 'id' => '402674', 'name' => '17 x 13 - Mountain Beauty',  'votes' => 0 ],
        [ 'id' => '402663', 'name' => '17 x 2 - The Old Home Place',  'votes' => 0 ],
        [ 'id' => '402664', 'name' => '17 x 3 - Soothing Vista',  'votes' => 0 ],
        [ 'id' => '402665', 'name' => '17 x 4 - Stormy Seas',  'votes' => 0 ],
        [ 'id' => '402666', 'name' => '17 x 5 - Country Time',  'votes' => 0 ],
        [ 'id' => '402667', 'name' => '17 x 6 - A Mild Winter\'s Day',  'votes' => 0 ],
        [ 'id' => '402668', 'name' => '17 x 7 - Spectacular Waterfall',  'votes' => 0 ],
        [ 'id' => '402669', 'name' => '17 x 8 - View From The Park',  'votes' => 0 ],
        [ 'id' => '402670', 'name' => '17 x 9 - Lake View',  'votes' => 0 ],
        [ 'id' => '487971', 'name' => '18 x 1 - Half-Oval Vignette',  'votes' => 0 ],
        [ 'id' => '488061', 'name' => '18 x 10 - Double Oval Stream',  'votes' => 0 ],
        [ 'id' => '488071', 'name' => '18 x 11 - Enchanted Forest',  'votes' => 0 ],
        [ 'id' => '488081', 'name' => '18 x 12 - Southwest Serenity',  'votes' => 0 ],
        [ 'id' => '488091', 'name' => '18 x 13 - Rippling Waters',  'votes' => 0 ],
        [ 'id' => '487981', 'name' => '18 x 2 - Absolutely Autumn',  'votes' => 0 ],
        [ 'id' => '487991', 'name' => '18 x 3 - Mountain Seclusion',  'votes' => 0 ],
        [ 'id' => '488001', 'name' => '18 x 4 - Crimson Oval',  'votes' => 0 ],
        [ 'id' => '488011', 'name' => '18 x 5 - Autumn Exhibition',  'votes' => 0 ],
        [ 'id' => '488021', 'name' => '18 x 6 - Majestic Peaks',  'votes' => 0 ],
        [ 'id' => '488031', 'name' => '18 x 7 - Golden Morning Mist',  'votes' => 0 ],
        [ 'id' => '488041', 'name' => '18 x 8 - Winter Lace',  'votes' => 0 ],
        [ 'id' => '488051', 'name' => '18 x 9 - Seascape Fantasy',  'votes' => 0 ],
        [ 'id' => '488921', 'name' => '19 x 1 - Snowfall Magic',  'votes' => 0 ],
        [ 'id' => '488971', 'name' => '19 x 10 - After the Rain',  'votes' => 0 ],
        [ 'id' => '488981', 'name' => '19 x 11 - Winter Elegance',  'votes' => 0 ],
        [ 'id' => '488991', 'name' => '19 x 12 - Evening\'s Peace',  'votes' => 0 ],
        [ 'id' => '489001', 'name' => '19 x 13 - Valley of Tranquility',  'votes' => 0 ],
        [ 'id' => '489011', 'name' => '19 x 2 - Quiet Mountain Lake',  'votes' => 0 ],
        [ 'id' => '489021', 'name' => '19 x 3 - Final Embers of Sunlight',  'votes' => 0 ],
        [ 'id' => '489031', 'name' => '19 x 4 - Snowy Morn',  'votes' => 0 ],
        [ 'id' => '489041', 'name' => '19 x 5 - Camper\'s Haven',  'votes' => 0 ],
        [ 'id' => '431615', 'name' => '19 x 6 - Waterfall in the Woods',  'votes' => 0 ],
        [ 'id' => '488931', 'name' => '19 x 7 - Covered Bridge Oval',  'votes' => 0 ],
        [ 'id' => '488951', 'name' => '19 x 8 - Scenic Seclusion',  'votes' => 0 ],
        [ 'id' => '488961', 'name' => '19 x 9 - Ebb Tide',  'votes' => 0 ],
        [ 'id' => '378173', 'name' => '2 x 1 - Meadow Lake',  'votes' => 0 ],
        [ 'id' => '378182', 'name' => '2 x 10 - Lazy River',  'votes' => 0 ],
        [ 'id' => '378183', 'name' => '2 x 11 - Black Waterfall',  'votes' => 0 ],
        [ 'id' => '378184', 'name' => '2 x 12 - Mountain Waterfall',  'votes' => 0 ],
        [ 'id' => '378185', 'name' => '2 x 13 - Final Grace',  'votes' => 0 ],
        [ 'id' => '378174', 'name' => '2 x 2 - Winter Sun',  'votes' => 0 ],
        [ 'id' => '378175', 'name' => '2 x 3 - Ebony Sea',  'votes' => 0 ],
        [ 'id' => '378176', 'name' => '2 x 4 - Shades of Grey',  'votes' => 0 ],
        [ 'id' => '378177', 'name' => '2 x 5 - Autumn Splendor',  'votes' => 0 ],
        [ 'id' => '378178', 'name' => '2 x 6 - Black River',  'votes' => 0 ],
        [ 'id' => '378179', 'name' => '2 x 7 - Brown Mountain',  'votes' => 0 ],
        [ 'id' => '378180', 'name' => '2 x 8 - Reflections',  'votes' => 0 ],
        [ 'id' => '378181', 'name' => '2 x 9 - Black and White Seascape',  'votes' => 0 ],
        [ 'id' => '902961', 'name' => '20 x 1 - Mystic Mountain',  'votes' => 0 ],
        [ 'id' => '903041', 'name' => '20 x 10 - Days Gone By',  'votes' => 0 ],
        [ 'id' => '903051', 'name' => '20 x 11 - Change of Seasons',  'votes' => 0 ],
        [ 'id' => '903061', 'name' => '20 x 12 - Hidden Delight',  'votes' => 0 ],
        [ 'id' => '903071', 'name' => '20 x 13 - Double Take',  'votes' => 0 ],
        [ 'id' => '902971', 'name' => '20 x 2 - New Day\'s Dawn',  'votes' => 0 ],
        [ 'id' => '902981', 'name' => '20 x 3 - Winter in Pastel',  'votes' => 0 ],
        [ 'id' => '902991', 'name' => '20 x 4 - Hazy Day',  'votes' => 0 ],
        [ 'id' => '903001', 'name' => '20 x 5 - Divine Elegance',  'votes' => 0 ],
        [ 'id' => '903011', 'name' => '20 x 6 - Cliffside',  'votes' => 0 ],
        [ 'id' => '903021', 'name' => '20 x 7 - Autumn Fantasy',  'votes' => 0 ],
        [ 'id' => '903031', 'name' => '20 x 8 - The Old Oak Tree',  'votes' => 0 ],
        [ 'id' => '431617', 'name' => '20 x 9 - Winter Paradise',  'votes' => 0 ],
        [ 'id' => '424848', 'name' => '21 x 1 - Valley View',  'votes' => 0 ],
        [ 'id' => '446794', 'name' => '21 x 10 - Blue Winter',  'votes' => 0 ],
        [ 'id' => '446795', 'name' => '21 x 11 - Desert Glow',  'votes' => 0 ],
        [ 'id' => '446796', 'name' => '21 x 12 - Lone Mountain',  'votes' => 0 ],
        [ 'id' => '446797', 'name' => '21 x 13 - Florida\'s Glory',  'votes' => 0 ],
        [ 'id' => '424849', 'name' => '21 x 2 - Tranquil Dawn',  'votes' => 0 ],
        [ 'id' => '424851', 'name' => '21 x 3 - Royal Majesty',  'votes' => 0 ],
        [ 'id' => '424852', 'name' => '21 x 4 - Serenity',  'votes' => 0 ],
        [ 'id' => '424853', 'name' => '21 x 5 - Cabin at Trails End',  'votes' => 0 ],
        [ 'id' => '424854', 'name' => '21 x 6 - Mountain Rhapsody',  'votes' => 0 ],
        [ 'id' => '424856', 'name' => '21 x 7 - Wilderness Cabin',  'votes' => 0 ],
        [ 'id' => '431616', 'name' => '21 x 8 - By The Sea',  'votes' => 0 ],
        [ 'id' => '446793', 'name' => '21 x 9 - Indian Summer',  'votes' => 0 ],
        [ 'id' => '488151', 'name' => '22 x 1 - Autumn Images',  'votes' => 0 ],
        [ 'id' => '488111', 'name' => '22 x 10 - Wintertime Blues',  'votes' => 0 ],
        [ 'id' => '488121', 'name' => '22 x 11 - Pastel Seascape',  'votes' => 0 ],
        [ 'id' => '488131', 'name' => '22 x 12 - Country Creek',  'votes' => 0 ],
        [ 'id' => '488141', 'name' => '22 x 13 - Silent Forest',  'votes' => 0 ],
        [ 'id' => 'S22E13', 'name' => '22 x 13 - Silent Forest',  'votes' => 0 ],
        [ 'id' => '488161', 'name' => '22 x 2 - Hint of Springtime',  'votes' => 0 ],
        [ 'id' => 'S22E3', 'name' => '22 x 3 - Around the Bend',  'votes' => 0 ],
        [ 'id' => '488181', 'name' => '22 x 4 - Countryside Oval',  'votes' => 0 ],
        [ 'id' => '488191', 'name' => '22 x 5 - Russet Winter',  'votes' => 0 ],
        [ 'id' => '488201', 'name' => '22 x 6 - Purple Haze',  'votes' => 0 ],
        [ 'id' => 'S22E6', 'name' => '22 x 6 - Purple Haze',  'votes' => 0 ],
        [ 'id' => '488211', 'name' => '22 x 7 - Dimensions',  'votes' => 0 ],
        [ 'id' => '488221', 'name' => '22 x 8 - Deep Wilderness Home',  'votes' => 0 ],
        [ 'id' => '488101', 'name' => '22 x 9 - Haven in the Valley',  'votes' => 0 ],
        [ 'id' => '488251', 'name' => '23 x 1 - Frosty Winter Morn',  'votes' => 0 ],
        [ 'id' => '488351', 'name' => '23 x 10 - Falls in the Glen',  'votes' => 0 ],
        [ 'id' => '488361', 'name' => '23 x 11 - Frozen Beauty in Vignette',  'votes' => 0 ],
        [ 'id' => '488371', 'name' => '23 x 12 - Crimson Tide',  'votes' => 0 ],
        [ 'id' => '488381', 'name' => '23 x 13 - Winter Bliss',  'votes' => 0 ],
        [ 'id' => '488271', 'name' => '23 x 2 - Forest Edge',  'votes' => 0 ],
        [ 'id' => '488281', 'name' => '23 x 3 - Mountain Ridge Lake',  'votes' => 0 ],
        [ 'id' => '488291', 'name' => '23 x 4 - Reflections of Gold',  'votes' => 0 ],
        [ 'id' => '488301', 'name' => '23 x 5 - Quiet Cove',  'votes' => 0 ],
        [ 'id' => '488311', 'name' => '23 x 6 - Rivers Peace',  'votes' => 0 ],
        [ 'id' => '488321', 'name' => '23 x 7 - At Dawn\'s Light',  'votes' => 0 ],
        [ 'id' => '488331', 'name' => '23 x 8 - Valley Waterfall',  'votes' => 0 ],
        [ 'id' => '488341', 'name' => '23 x 9 - Toward Days End',  'votes' => 0 ],
        [ 'id' => '488391', 'name' => '24 x 1 - Gray Mountain',  'votes' => 0 ],
        [ 'id' => '488481', 'name' => '24 x 10 - Rowboat on the Beach',  'votes' => 0 ],
        [ 'id' => '488491', 'name' => '24 x 11 - Portrait of Winter',  'votes' => 0 ],
        [ 'id' => '488501', 'name' => '24 x 12 - The Footbridge',  'votes' => 0 ],
        [ 'id' => '488511', 'name' => '24 x 13 - Snowbound Cabin',  'votes' => 0 ],
        [ 'id' => '488401', 'name' => '24 x 2 - Wayside Pond',  'votes' => 0 ],
        [ 'id' => '488411', 'name' => '24 x 3 - Teton Winter',  'votes' => 0 ],
        [ 'id' => '488421', 'name' => '24 x 4 - Little Home in the Meadow',  'votes' => 0 ],
        [ 'id' => '488431', 'name' => '24 x 5 - A Pretty Autumn Day',  'votes' => 0 ],
        [ 'id' => '488441', 'name' => '24 x 6 - Mirrored Images',  'votes' => 0 ],
        [ 'id' => '488451', 'name' => '24 x 7 - Back-Country Path',  'votes' => 0 ],
        [ 'id' => '488461', 'name' => '24 x 8 - Graceful Waterfall',  'votes' => 0 ],
        [ 'id' => '488471', 'name' => '24 x 9 - Icy Lake',  'votes' => 0 ],
        [ 'id' => '440525', 'name' => '25 x 1 - Hide A Way Cove',  'votes' => 0 ],
        [ 'id' => '431620', 'name' => '25 x 10 - Just Before The Storm',  'votes' => 0 ],
        [ 'id' => '440532', 'name' => '25 x 11 - Fisherman\'s Paradise',  'votes' => 0 ],
        [ 'id' => '440533', 'name' => '25 x 12 - Desert Hues',  'votes' => 0 ],
        [ 'id' => '440534', 'name' => '25 x 13 - The Property Line',  'votes' => 0 ],
        [ 'id' => '440526', 'name' => '25 x 2 - Enchanted Falls Oval',  'votes' => 0 ],
        [ 'id' => '440527', 'name' => '25 x 3 - Not Quite Spring',  'votes' => 0 ],
        [ 'id' => '440528', 'name' => '25 x 4 - Splashes Of Autumn',  'votes' => 0 ],
        [ 'id' => '440529', 'name' => '25 x 5 - Summer In The Mountain',  'votes' => 0 ],
        [ 'id' => '431619', 'name' => '25 x 6 - Oriental Falls',  'votes' => 0 ],
        [ 'id' => '440530', 'name' => '25 x 7 - Autumn Palette',  'votes' => 0 ],
        [ 'id' => '440531', 'name' => '25 x 8 - Cypress Swamp',  'votes' => 0 ],
        [ 'id' => '431618', 'name' => '25 x 9 - Downstream View',  'votes' => 0 ],
        [ 'id' => '488521', 'name' => '26 x 1 - In the Stillness of Morning',  'votes' => 0 ],
        [ 'id' => '488611', 'name' => '26 x 10 - Purple Mountain Range',  'votes' => 0 ],
        [ 'id' => '488621', 'name' => '26 x 11 - Storm\'s A Comin',  'votes' => 0 ],
        [ 'id' => '488631', 'name' => '26 x 12 - Sunset Aglow',  'votes' => 0 ],
        [ 'id' => '488641', 'name' => '26 x 13 - Evening at the Falls',  'votes' => 0 ],
        [ 'id' => '488531', 'name' => '26 x 2 - Delightful Meadow Home',  'votes' => 0 ],
        [ 'id' => '488541', 'name' => '26 x 3 - First Snow',  'votes' => 0 ],
        [ 'id' => '488551', 'name' => '26 x 4 - Lake in the Valley',  'votes' => 0 ],
        [ 'id' => '488561', 'name' => '26 x 5 - A Trace of Spring',  'votes' => 0 ],
        [ 'id' => '488571', 'name' => '26 x 6 - An Arctic Winter Day',  'votes' => 0 ],
        [ 'id' => '488581', 'name' => '26 x 7 - Snow Birch',  'votes' => 0 ],
        [ 'id' => '488591', 'name' => '26 x 8 - Early Autumn',  'votes' => 0 ],
        [ 'id' => '488601', 'name' => '26 x 9 - Tranquil Wooded Stream',  'votes' => 0 ],
        [ 'id' => '422896', 'name' => '27 x 1 - Twilight Beauty',  'votes' => 0 ],
        [ 'id' => '422905', 'name' => '27 x 10 - Sunlight in the Shadows',  'votes' => 0 ],
        [ 'id' => '422906', 'name' => '27 x 11 - Splendor of a Snowy Winter',  'votes' => 0 ],
        [ 'id' => '422907', 'name' => '27 x 12 - Forest River',  'votes' => 0 ],
        [ 'id' => '422908', 'name' => '27 x 13 - Golden Glow of Morning',  'votes' => 0 ],
        [ 'id' => '422897', 'name' => '27 x 2 - Angler\'s Haven',  'votes' => 0 ],
        [ 'id' => '422898', 'name' => '27 x 3 - Rustic Winter Woods',  'votes' => 0 ],
        [ 'id' => '422899', 'name' => '27 x 4 - Wilderness Falls',  'votes' => 0 ],
        [ 'id' => '422900', 'name' => '27 x 5 - Winter at the Farm',  'votes' => 0 ],
        [ 'id' => '422901', 'name' => '27 x 6 - Daisies at Dawn',  'votes' => 0 ],
        [ 'id' => '422902', 'name' => '27 x 7 - A Spectacular View',  'votes' => 0 ],
        [ 'id' => '422903', 'name' => '27 x 8 - Daybreak',  'votes' => 0 ],
        [ 'id' => '422904', 'name' => '27 x 9 - Island Paradise',  'votes' => 0 ],
        [ 'id' => '445115', 'name' => '28 x 1 - Fisherman\'s Trail',  'votes' => 0 ],
        [ 'id' => '445123', 'name' => '28 x 10 - Splendor of Autumn',  'votes' => 0 ],
        [ 'id' => '445124', 'name' => '28 x 11 - Tranquil Seas',  'votes' => 0 ],
        [ 'id' => '431622', 'name' => '28 x 12 - Mountain Serenity',  'votes' => 0 ],
        [ 'id' => '445114', 'name' => '28 x 13 - Home before Nightfall',  'votes' => 0 ],
        [ 'id' => '445116', 'name' => '28 x 2 - A Warm Winter',  'votes' => 0 ],
        [ 'id' => '445117', 'name' => '28 x 3 - Under Pastel Skies',  'votes' => 0 ],
        [ 'id' => '445118', 'name' => '28 x 4 - Golden Rays of Sunshine',  'votes' => 0 ],
        [ 'id' => '445119', 'name' => '28 x 5 - The Magic of Fall',  'votes' => 0 ],
        [ 'id' => '445120', 'name' => '28 x 6 - Glacier Lake',  'votes' => 0 ],
        [ 'id' => '445121', 'name' => '28 x 7 - The Old Weathered Barn',  'votes' => 0 ],
        [ 'id' => '445122', 'name' => '28 x 8 - Deep Forest Falls',  'votes' => 0 ],
        [ 'id' => '431621', 'name' => '28 x 9 - Winter\'s Grace',  'votes' => 0 ],
        [ 'id' => '489051', 'name' => '29 x 1 - Island in the Wilderness',  'votes' => 0 ],
        [ 'id' => '489111', 'name' => '29 x 10 - Pot O\' Posies',  'votes' => 0 ],
        [ 'id' => '489121', 'name' => '29 x 11 - A Perfect Winter Day',  'votes' => 0 ],
        [ 'id' => '489131', 'name' => '29 x 12 - Aurora\'s Dance',  'votes' => 0 ],
        [ 'id' => '489141', 'name' => '29 x 13 - Woodman\'s Retreat',  'votes' => 0 ],
        [ 'id' => '489061', 'name' => '29 x 2 - Autumn Oval',  'votes' => 0 ],
        [ 'id' => '431623', 'name' => '29 x 3 - Seasonal Progression',  'votes' => 0 ],
        [ 'id' => '431624', 'name' => '29 x 4 - Light at the Summit',  'votes' => 0 ],
        [ 'id' => '431625', 'name' => '29 x 5 - Countryside Barn',  'votes' => 0 ],
        [ 'id' => '489071', 'name' => '29 x 6 - Mountain Lake Falls',  'votes' => 0 ],
        [ 'id' => '489081', 'name' => '29 x 7 - Cypress Creek',  'votes' => 0 ],
        [ 'id' => '489091', 'name' => '29 x 8 - Trapper\'s Cabin',  'votes' => 0 ],
        [ 'id' => '489101', 'name' => '29 x 9 - Storm on the Horizon',  'votes' => 0 ],
        [ 'id' => '4066881', 'name' => '3 x 1 - Mountain Retreat',  'votes' => 0 ],
        [ 'id' => '4066971', 'name' => '3 x 10 - Campfire',  'votes' => 0 ],
        [ 'id' => '4066981', 'name' => '3 x 11 - Rustic Barn',  'votes' => 0 ],
        [ 'id' => '4066991', 'name' => '3 x 12 - Hidden Lake',  'votes' => 0 ],
        [ 'id' => '4067001', 'name' => '3 x 13 - Peaceful Waters',  'votes' => 0 ],
        [ 'id' => '4066891', 'name' => '3 x 2 - Blue Moon',  'votes' => 0 ],
        [ 'id' => '4066901', 'name' => '3 x 3 - Bubbling Stream',  'votes' => 0 ],
        [ 'id' => '4066911', 'name' => '3 x 4 - Winter Night',  'votes' => 0 ],
        [ 'id' => '4066921', 'name' => '3 x 5 - Distant Hills',  'votes' => 0 ],
        [ 'id' => '4066931', 'name' => '3 x 6 - Covered Bridge',  'votes' => 0 ],
        [ 'id' => '4066941', 'name' => '3 x 7 - Quiet Inlet',  'votes' => 0 ],
        [ 'id' => '4066951', 'name' => '3 x 8 - Night Light',  'votes' => 0 ],
        [ 'id' => '4066961', 'name' => '3 x 9 - The Old Mill',  'votes' => 0 ],
        [ 'id' => '488651', 'name' => '30 x 1 - Babbling Brook',  'votes' => 0 ],
        [ 'id' => '488741', 'name' => '30 x 10 - Seaside Harmony',  'votes' => 0 ],
        [ 'id' => '488751', 'name' => '30 x 11 - A Cold Spring Day',  'votes' => 0 ],
        [ 'id' => '488761', 'name' => '30 x 12 - Evening\'s Glow',  'votes' => 0 ],
        [ 'id' => '488771', 'name' => '30 x 13 - Blue Ridge Falls',  'votes' => 0 ],
        [ 'id' => '488661', 'name' => '30 x 2 - Woodgrain\'s View',  'votes' => 0 ],
        [ 'id' => '488671', 'name' => '30 x 3 - Winter\'s Peace',  'votes' => 0 ],
        [ 'id' => '488681', 'name' => '30 x 4 - Wilderness Trail',  'votes' => 0 ],
        [ 'id' => '488691', 'name' => '30 x 5 - A Copper Winter',  'votes' => 0 ],
        [ 'id' => '488701', 'name' => '30 x 6 - Misty Foothills',  'votes' => 0 ],
        [ 'id' => '488711', 'name' => '30 x 7 - Through the Window',  'votes' => 0 ],
        [ 'id' => '488721', 'name' => '30 x 8 - Home in the Valley',  'votes' => 0 ],
        [ 'id' => '488731', 'name' => '30 x 9 - Mountains of Grace',  'votes' => 0 ],
        [ 'id' => '488791', 'name' => '31 x 1 - Reflections of Calm',  'votes' => 0 ],
        [ 'id' => '488881', 'name' => '31 x 10 - Balmy Beach',  'votes' => 0 ],
        [ 'id' => '488891', 'name' => '31 x 11 - Lake at the Ridge',  'votes' => 0 ],
        [ 'id' => '488901', 'name' => '31 x 12 - In the Midst of Winter',  'votes' => 0 ],
        [ 'id' => '488911', 'name' => '31 x 13 - Wilderness Day',  'votes' => 0 ],
        [ 'id' => '488801', 'name' => '31 x 2 - Before the Snowfall',  'votes' => 0 ],
        [ 'id' => '488811', 'name' => '31 x 3 - Winding Stream',  'votes' => 0 ],
        [ 'id' => '488821', 'name' => '31 x 4 - Tranquility Cove',  'votes' => 0 ],
        [ 'id' => '488831', 'name' => '31 x 5 - Cabin in the Hollow',  'votes' => 0 ],
        [ 'id' => '488841', 'name' => '31 x 6 - View from Clear Creek',  'votes' => 0 ],
        [ 'id' => '488851', 'name' => '31 x 7 - Bridge to Autumn',  'votes' => 0 ],
        [ 'id' => '488861', 'name' => '31 x 8 - Trail\'s End',  'votes' => 0 ],
        [ 'id' => '488871', 'name' => '31 x 9 - Evergreen Valley',  'votes' => 0 ],
        [ 'id' => '1958351', 'name' => '4 x 1 - Purple Splendor',  'votes' => 0 ],
        [ 'id' => '2626521', 'name' => '4 x 10 - Quiet Woods',  'votes' => 0 ],
        [ 'id' => '2626531', 'name' => '4 x 11 - Northwest Majesty',  'votes' => 0 ],
        [ 'id' => '2626541', 'name' => '4 x 12 - Autumn Days',  'votes' => 0 ],
        [ 'id' => '2986511', 'name' => '4 x 13 - Mountain Challenge',  'votes' => 0 ],
        [ 'id' => '1958361', 'name' => '4 x 2 - Tranquil Valley',  'votes' => 0 ],
        [ 'id' => '1958371', 'name' => '4 x 3 - Majestic Mountains',  'votes' => 0 ],
        [ 'id' => '1958381', 'name' => '4 x 4 - Winter Sawscape',  'votes' => 0 ],
        [ 'id' => '2626471', 'name' => '4 x 5 - Evening Seascape',  'votes' => 0 ],
        [ 'id' => '2626481', 'name' => '4 x 6 - Warm Summer Day',  'votes' => 0 ],
        [ 'id' => '2626491', 'name' => '4 x 7 - Cabin in the Woods',  'votes' => 0 ],
        [ 'id' => '2626501', 'name' => '4 x 8 - Wetlands',  'votes' => 0 ],
        [ 'id' => '2626511', 'name' => '4 x 9 - Cool Waters',  'votes' => 0 ],
        [ 'id' => '2339801', 'name' => '5 x 1 - Mountain Waterfall',  'votes' => 0 ],
        [ 'id' => '2339891', 'name' => '5 x 10 - The Windmill',  'votes' => 0 ],
        [ 'id' => '2339901', 'name' => '5 x 11 - Autumn Glory',  'votes' => 0 ],
        [ 'id' => '2339911', 'name' => '5 x 12 - Indian Girl',  'votes' => 0 ],
        [ 'id' => '2339921', 'name' => '5 x 13 - Meadow Stream',  'votes' => 0 ],
        [ 'id' => '2339811', 'name' => '5 x 2 - Twilight Meadow',  'votes' => 0 ],
        [ 'id' => '2339821', 'name' => '5 x 3 - Mountain Blossoms',  'votes' => 0 ],
        [ 'id' => '2339831', 'name' => '5 x 4 - Winter Stillness',  'votes' => 0 ],
        [ 'id' => '2339841', 'name' => '5 x 5 - Quiet Pond',  'votes' => 0 ],
        [ 'id' => '2339851', 'name' => '5 x 6 - Ocean Sunrise',  'votes' => 0 ],
        [ 'id' => '2339861', 'name' => '5 x 7 - Bubbling Brook',  'votes' => 0 ],
        [ 'id' => '2339871', 'name' => '5 x 8 - Arizona Splendor',  'votes' => 0 ],
        [ 'id' => '2339881', 'name' => '5 x 9 - Anatomy of a Wave',  'votes' => 0 ],
        [ 'id' => '2264771', 'name' => '6 x 1 - Blue River',  'votes' => 0 ],
        [ 'id' => '2264861', 'name' => '6 x 10 - Country Life',  'votes' => 0 ],
        [ 'id' => '2264871', 'name' => '6 x 11 - Western Expanse',  'votes' => 0 ],
        [ 'id' => '2264881', 'name' => '6 x 12 - Marshlands',  'votes' => 0 ],
        [ 'id' => '2264891', 'name' => '6 x 13 - Blaze of Color',  'votes' => 0 ],
        [ 'id' => '2264781', 'name' => '6 x 2 - Nature\'s Edge',  'votes' => 0 ],
        [ 'id' => '2264791', 'name' => '6 x 3 - Morning Mist',  'votes' => 0 ],
        [ 'id' => '2264801', 'name' => '6 x 4 - Whispering Stream',  'votes' => 0 ],
        [ 'id' => '2264811', 'name' => '6 x 5 - Secluded Forest',  'votes' => 0 ],
        [ 'id' => '2264821', 'name' => '6 x 6 - Snow Trail',  'votes' => 0 ],
        [ 'id' => '2264831', 'name' => '6 x 7 - Arctic Beauty',  'votes' => 0 ],
        [ 'id' => '2264841', 'name' => '6 x 8 - Horizons West',  'votes' => 0 ],
        [ 'id' => '2264851', 'name' => '6 x 9 - High Chateau',  'votes' => 0 ],
        [ 'id' => '2184001', 'name' => '7 x 1 - Winter Cabin',  'votes' => 0 ],
        [ 'id' => '2184091', 'name' => '7 x 10 - Mountain Glory',  'votes' => 0 ],
        [ 'id' => '2184101', 'name' => '7 x 11 - Grey Winter',  'votes' => 0 ],
        [ 'id' => '2184111', 'name' => '7 x 12 - Dock Scene',  'votes' => 0 ],
        [ 'id' => '2184121', 'name' => '7 x 13 - Dark Waterfall',  'votes' => 0 ],
        [ 'id' => '2184011', 'name' => '7 x 2 - Secluded Lake',  'votes' => 0 ],
        [ 'id' => '2184021', 'name' => '7 x 3 - Evergreens at Sunset',  'votes' => 0 ],
        [ 'id' => '2184031', 'name' => '7 x 4 - Mountain Cabin',  'votes' => 0 ],
        [ 'id' => '2184041', 'name' => '7 x 5 - Portrait of Sally',  'votes' => 0 ],
        [ 'id' => '2184051', 'name' => '7 x 6 - Misty Waterfall',  'votes' => 0 ],
        [ 'id' => '2184061', 'name' => '7 x 7 - Barn at Sunset',  'votes' => 0 ],
        [ 'id' => '2184071', 'name' => '7 x 8 - Mountain Splendor',  'votes' => 0 ],
        [ 'id' => '2184081', 'name' => '7 x 9 - Lake by Mountain',  'votes' => 0 ],
        [ 'id' => '1775761', 'name' => '8 x 1 - Misty Rolling Hills',  'votes' => 0 ],
        [ 'id' => '1775851', 'name' => '8 x 10 - Cactus at Sunset',  'votes' => 0 ],
        [ 'id' => '1775861', 'name' => '8 x 11 - Mountain Range',  'votes' => 0 ],
        [ 'id' => '1775871', 'name' => '8 x 12 - Lonely Retreat',  'votes' => 0 ],
        [ 'id' => '1775881', 'name' => '8 x 13 - Northern Lights',  'votes' => 0 ],
        [ 'id' => '1775771', 'name' => '8 x 2 - Lakeside Cabin',  'votes' => 0 ],
        [ 'id' => '1775781', 'name' => '8 x 3 - Warm Winter Day',  'votes' => 0 ],
        [ 'id' => '1775791', 'name' => '8 x 4 - Waterside Way',  'votes' => 0 ],
        [ 'id' => '1775801', 'name' => '8 x 5 - Hunter\'s Haven',  'votes' => 0 ],
        [ 'id' => '1775811', 'name' => '8 x 6 - Bubbling Mountain Brook',  'votes' => 0 ],
        [ 'id' => '1775821', 'name' => '8 x 7 - Winter Hideaway',  'votes' => 0 ],
        [ 'id' => '1775831', 'name' => '8 x 8 - Foot of the Mountain',  'votes' => 0 ],
        [ 'id' => '1775841', 'name' => '8 x 9 - Majestic Pine',  'votes' => 0 ],
        [ 'id' => '1691561', 'name' => '9 x 1 - Winter Evergreens',  'votes' => 0 ],
        [ 'id' => '1691571', 'name' => '9 x 10 - Country Charm',  'votes' => 0 ],
        [ 'id' => '1691581', 'name' => '9 x 11 - Nature\'s Paradise',  'votes' => 0 ],
        [ 'id' => '1691591', 'name' => '9 x 12 - Mountain by the Sea',  'votes' => 0 ],
        [ 'id' => '1691601', 'name' => '9 x 13 - Mountain Hideaway',  'votes' => 0 ],
        [ 'id' => '1691611', 'name' => '9 x 2 - Surf\'s Up',  'votes' => 0 ],
        [ 'id' => '1691621', 'name' => '9 x 3 - Red Sunset',  'votes' => 0 ],
        [ 'id' => '1691631', 'name' => '9 x 4 - Meadow Road',  'votes' => 0 ],
        [ 'id' => '1691641', 'name' => '9 x 5 - Winter Oval',  'votes' => 0 ],
        [ 'id' => '1691651', 'name' => '9 x 6 - Secluded Beach',  'votes' => 0 ],
        [ 'id' => '1691661', 'name' => '9 x 7 - Forest Hills',  'votes' => 0 ],
        [ 'id' => '1691671', 'name' => '9 x 8 - Little House by the Road',  'votes' => 0 ],
        [ 'id' => '1691681', 'name' => '9 x 9 - Mountain Path',  'votes' => 0 ]
    ];
    file_put_contents('paintings.txt',serialize($paintings));
}

