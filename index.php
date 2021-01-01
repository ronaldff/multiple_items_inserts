<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
  </head>
  <body>
    <form id="formData" method="post">
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th scope="col">checkbox</th>
            <th scope="col">Product name</th>
            <th scope="col">Product quantity</th>
          </tr>
        </thead>
        <tbody id="tbodyData">
         
        </tbody>
      </table>
      <div class="text-center">
        <button type="submit" id="btnSubmit" class="btn btn-primary text-center">Submit</button>
      </div>
    </form>
    
    <script src="jquery.js"></script>
    
    <script>
      $(() => {
        // create dynamic rows in the table
        let n=2;
        let cat_val = ['dummy','car','mobile'];
        let html = '';
        for (let i = 1; i <= n; i++) {
          html += `<tr id="${i}">
            		<td>
						<input type="checkbox" value="${cat_val[i]}" class="checkbox" id="cat_${i}">
					</td>
            		<td>
						<input type="text" name="product_name" placeholder="Enter Product Name" id="${i}_product_name">
					</td>
            		<td>
						<input type="number" name="product_quantity" placeholder="Enter Product Quantity" id="${i}_product_quantity">
					</td>
          		</tr>`;
        }

        $("#tbodyData").append(html);

		// submit form logic
        $("#btnSubmit").click(e => {
          	e.preventDefault();
			let cat = '',prod_name = '',prod_qty = '',insertCheckedBox = [],obj;
          	let checked = $("#tbodyData input[type=checkbox]:checked").length;
			

          	if(checked > 0){
            	$("input[type=checkbox]:checked").each(function(i,e) { 
              		obj = {};
              		if ($(e).is(':checked')) {
						i++;
						
						cat = $(e).val();
						prod_name =$(this).parent('td').next('td').children("input[type=text]").val();
						prod_qty = $(this).parent('td').next('td').next('td').children("input[type=number]").val();

						if(cat ==="" || prod_name ==="" || prod_qty ===""){
						alert('please insert input checked checkbox value');
						return false;
						} else {
							obj.cat = cat;
							obj.prod_name = prod_name;
							obj.prod_qty = prod_qty;
						}
						insertCheckedBox.push(obj);
					} 
            	});
          	} else {
            	alert("please checked atleast one checkbox");
              return false;
          	}

          	let insertChecked =  insertCheckedBox.length;

			if(insertChecked > 0){
				console.log(insertCheckedBox);
				// here you can write your ajax code to insert data into the datatbase
			} 
        })
       
      });
    </script>
  </body>
</html>