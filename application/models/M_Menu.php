<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Menu extends CI_Model
{
    public function getAllCategory()
    {
        $getCategory    = $this->db->query("SELECT * FROM Category")->result_array();
        $category       = [];

        foreach ($getCategory as $cat) {
            $categoryId     = $cat['CategoryID'];
            $arrayCategory  = (array) $categoryId;

            foreach ($arrayCategory as $arrCat) {
                $getSubCategory = $this->db->query("SELECT * FROM SubCategory WHERE CategoryID = '$arrCat' ")->result_array();
                $subCategory    = [];

                foreach ($getSubCategory as $subcat) {
                    $subCategoryId = $subcat['SubCategoryID'];
                    $arraySubCategory = (array)$subCategoryId;

                    foreach ($arraySubCategory as $arrSubCat) {
                        $getProductsPivot   = $this->db->query("SELECT * FROM ProductPivot WHERE SubCategoryID = '$arrSubCat' ")->result_array();
                        $productsPivot      = [];

                        foreach ($getProductsPivot as $prodPiv) {
                            $productsPivot[] = array(
                                'ProductPivotID'    => $prodPiv['ProductPivotID'],
                                'SubCategoryID'     => $prodPiv['SubCategoryID'],
                                'ProductID'         => $prodPiv['ProductID']
                            );
                        }
                    }

                    $subCategory[] = array(
                        'SubCategoryID'     => $subcat['SubCategoryID'],
                        'CategoryID'        => $subcat['CategoryID'],
                        'SubCategoryName'   => $subcat['SubCategoryName'],
                        'SubCatPosition'    => $subcat['SubCatPosition'],
                        'SubUrl'            => $subcat['SubUrl'],
                        'ProductPivot'      => $productsPivot
                    );
                }
            }

            $category[] = array(
                'CategoryID'        => $cat['CategoryID'],
                'CategoryName'      => $cat['CategoryName'],
                'CategoryUrl'       => $cat['CategoryUrl'],
                'CatPosition'       => $cat['CatPosition'],
                'SubCategory'       => $subCategory
            );
        }
        return $category;
    }
}
