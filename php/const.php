<?php 


define("GET_TOP_LINKS_QUERY", "SELECT links.PKLinks, links.description, categories.PKCategories, links.name, links.address FROM categories LEFT JOIN links ON links.FKCategories = categories.PKCategories 
WHERE links.FKCategories = categories.PKCategories ORDER BY clicks DESC limit 0,4");

define("GET_ALL_CATEGORIES_QUERY", "SELECT name, PKCategories FROM categories ORDER BY name ASC");


define("SEARCH_QUERY", "SELECT links.PKLinks, links.description, links.keywords, categories.PKCategories, links.name, links.address FROM categories LEFT JOIN links ON links.FKCategories = categories.PKCategories 
WHERE links.name LIKE CONCAT('%', ?, '%') OR links.keywords LIKE CONCAT('%', ?, '%') OR categories.name LIKE CONCAT('%', ?, '%') OR links.description LIKE CONCAT('%', ?, '%')  ORDER BY clicks DESC limit 0,10");


function getLinkContainer($category, $name, $desc, $address, $PKLinks){
   
    if($category){
        return "<div class='col-xs-12 col-sm-6
        col-md-6
        col-lg-6 mb'>
            <div data-aos='zoom-in' class='box'>
                
                <div class='link-content'>
                <h3>" . $name . "</h3>
                    <p>" . $desc . "</p>
                    <form action='' method='POST'>
                        <input name='PKLinks' type='hidden' value='" . $PKLinks . "'>
                        <input name='address' type='hidden' value='" . $address . "'>
                        <button class='link-btn' name='submit-top-link-click' type='submit' >
                            " . $address . "
                        </button>
                    </form>
                </div>
        </div>
    </div>";
    }else{
        return "<div class='col-xs-12 col-sm-6
        col-md-6
        col-lg-6 mb'>
            <div data-aos='zoom-in' class='box'>
                
                <div class='link-content'>
                <h3>" . $name . "</h3>
                    <p>" . $desc . "</p>
                    <form action='' method='POST'>
                        <input name='PKLinks' type='hidden' value='" . $PKLinks . "'>
                        <input name='address' type='hidden' value='" . $address . "'>
                        <button class='link-btn' name='submit-top-link-click' type='submit' >
                            " . $address . "
                        </button>
                    </form>
                </div>
        </div>
    </div>";
    }
   
    
}