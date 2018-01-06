<?php session_start();
class shopCart{
    protected $itemsInCart = array();
    //create the cart
    public function __construct()
    {
      //get the cart array when there are items in the session
      $this->itemsInCart = !empty($_SESSION['itemsInCart'])?$_SESSION['itemsInCart']:NULL;
      //if there are no items in the cart
      if($this->itemsInCart === null)
      {
        //set the total price of the cart and total number of items in the cart equal to 0
        $this->itemsInCart = array('shopCartTotal' => 0, 'totalCartItems' => 0);
      }
    }

    //this will return an array of all the items in the cart
    public function shopCartContents()
    {
      //return the items in the array in the reverse order
      $cart= array_reverse($this->itemsInCart);
      //destroy these values 
      unset($cart['totalCartItems']);
      unset($cart['shopCartTotal']);
      return $cart;
     }

    //gets the total number of items in the shopping cart
    public function totalCartItems()
    {
      return $this->itemsInCart['totalCartItems'];
    }

    //gets the total of the shopping cart
    public function shopCartPrice()
    {
      return $this->itemsInCart['shopCartTotal'];
    }

    //add item to the array
    public function insert($item = array())
    {
        //if not an array or the number of elements of array is 0
        if(!is_array($item) OR count($item) === 0)
        {
          return FALSE;
        }
        //otherwise try to insert item
        else
        {
          //if it does not have an id, name, price or quantity do not insert
          if(!isset($item['id'], $item['name'], $item['price'], $item['qty']))
          {
            return FALSE;
          }
          //otherwise continue
          else
          {
              //convert
              $item['qty'] = (float) $item['qty'];
              //if customer requests 0 of the item
              if($item['qty'] == 0)
              {
                 return FALSE;
              }
              //get price of the item as a float since we are using decimals
              $item['price'] = (float) $item['price'];
              //calculate the md5 hash for the item id for more security
              $productID = md5($item['id']);
              //if the product is already in the cart, just add the quantity
              $previousQuantity = isset($this->itemsInCart[$productID]['qty']) ? (int)
                      $this->itemsInCart[$productID]['qty'] : 0;
              //update the md5 hash with the new total quantity of the product
              $item['productID'] = $productID;
              $item['qty'] += $previousQuantity;
              //item with updated id and quantity
              $this->itemsInCart[$productID] = $item;
              //save product in the cart
              if($this->saveshopCart())
              {
                  //checks the product exists and the value is not null
                  return isset($productID) ? $productID : TRUE;
              }
              else
              {
                  return FALSE;
              }
          }
        }
    }

     //updating the quantity of the product in the cart
     public function update($item = array())
     {
        //if not an array or the number of elements of array is 0
        if(!is_array($item) OR count($item) === 0)
        {
          return FLASE;
        }
        else
        {
          if(!isset($item['productID'], $this->itemsInCart[$item['productID']]))
          {
            return FALSE;
          }
          else
          {
            //check there's already a product quantity
            if(isset($item['qty']))
            {
              $item['qty'] = (float) $item['qty'];
              //if the quantity of the item is set to 0, unset it from the cart
              if($item['qty'] == 0)
              {
                unset($this->itemsInCart[$item['productID']]);
                return TRUE;
              }
            }
            //compare the two arrays and their keys so we can update the item
            $keys = array_intersect(array_keys($this->itemsInCart[$item['productID']]), array_keys($item));
            //set the price of the product
            if(isset($item['price']))
            {
              $item['price'] = (float) $item['price'];
            }
            //update the product
            foreach($keys as $key)
            {
              $this->itemsInCart[$item['productID']][$key] = $item[$key];
            }
            //save shopping cart
            $this->saveshopCart();
            return TRUE;
          }
        }
     }

      //save all the products in the shopping cart to the session
      protected function saveshopCart()
      {
          $this->itemsInCart['totalCartItems'] = $this->itemsInCart['shopCartTotal'] = 0;
          foreach($this->itemsInCart as $key => $product)
          {
            //check the array items 
            if(!is_array($product) OR !isset($product['price'], $product['qty']))
            {
              continue;
            }
            //begin to calculate the total price and number of items in the cart
            $this->itemsInCart['shopCartTotal'] += ($product['price'] * $product['qty']);
            $this->itemsInCart['totalCartItems'] += $product['qty'];
            $this->itemsInCart[$key]['subtotal'] = ($this->itemsInCart[$key]['price'] * $this->itemsInCart[$key]['qty']);
          }

          //check if the shopping cart is empty 
          //it would be <=2 since an empty cart has shopCartTotal and totalCartItems both equal to 0
          if(count($this->itemsInCart) <= 2)
          {
            //destroy shopping cart
            unset($_SESSION['itemsInCart']);
            return FALSE;
          }
          else
          {
            //if not empty, set the shopping cart session
            $_SESSION['itemsInCart'] = $this->itemsInCart;
            return TRUE;
          }
      }

     //removes the product from the cart - customer will click button to remove
     public function remove($product_ID)
     {
        //destroy variable from cart
        unset($this->itemsInCart[$product_ID]);
        //save the shopping cart with removed product
        $this->saveshopCart();
        return TRUE;
     }

    //empty the cart after the customer makes a purchase
    public function destroy()
    {
        //set our starting values for the cart back to 0 
        $this->itemsInCart = array('shopCartTotal' => 0, 'totalCartItems' => 0);
        //destroy our shopping cart session so customer can begin new session after ordering
        unset($_SESSION['itemsInCart']);
    }
}
?>