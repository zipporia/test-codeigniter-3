<?php $this->load->view('templates/header');?>

<div class="container">
    <div class="products">
        <h2>Check Out</h2>
        <table>
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
<?php       foreach($order_item as $row){   ?>
            <tr>
                <td><?=$row['quantity'];?></td>
                <td><?=$row['description'];?></td>
                <td><?=$row['total_price'];?></td>
                <td><a class="delete_btn" href="/products/destroy/<?=$row['id'];?>"> Delete </a></td>
            </tr>
<?php       } ?>
            <tr class="total_amount">
                <td></td>
                <td>Total</td>
<?php   foreach($sum_amount as $row){?>
                <td><?= $row['grand_total'] ?></td>
                <td></td>
<?php   }   ?>
            </tr>
        </table>
    </div>
    <div class="billing">
        <h2>Billing Info</h2>
        <?= form_open("/products/billing" , 'autocomplete="0ff"') ?>    
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="card" placeholder="Card No.">
            <input class="order_btn" type="submit" value="Order">
        </form>
    </div>
</div>

<?php $this->load->view('templates/footer');?>