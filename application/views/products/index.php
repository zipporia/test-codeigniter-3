<?php $this->load->view('templates/header');?>

<div class="container">
    <div class="products">
        <h2>Products</h2>
        <table>
            <tr>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
<?php       foreach($product as $row){?>
            <tr>
                <td><?=$row['description'];?></td>
                <td><?=$row['price'];?></td>
                <td>
                    <?=form_open ('/products/orders', 'autocomplete="off"')?>
                        <input type="hidden" name="id" value="<?=$row['id'];?>">
                        <input class="qty" type="number" name="quantity" min="0">
                        <input class="buy_btn" type="submit" value="Buy">
                    </form>
                </td>
            </tr>
<?php       }   ?>
        </table>
    </div>

    <div class="show_cart">
<?php   foreach($quantity as $row){?>
        <a href="/products/cart">Your Cart <?= $row['quantity']; ?></a>
 <?php   }   ?>
    </div>
    </div>
</div>

<?php $this->load->view('templates/footer');?>

 

