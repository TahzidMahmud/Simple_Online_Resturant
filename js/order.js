let un_price = 0;
let f_id;
let tmp;
let count;
let total;
let final_count;
function orderFunction(id, unit_price) {
  un_price = unit_price;
  f_id = id;
  count = document.getElementById("quantity").value = 1;
  document.getElementById("total").value = un_price;
  tmp = document.getElementById("food_id").value = f_id;
}
function calculate() {
  final_count = document.getElementById("quantity").value;

  total = final_count * un_price;
  if (total <= 0) {
    total = 0;
  }

  document.getElementById("total").value = total;
}
function decrease() {
  let temp = final_count;
  if (count <= 0) {
    count = 0;
  }
  if (temp <= 0) {
    final_count = 0;
  } else {
    count = count - 1;
    temp = count;
    final_count = temp;
  }
  total = final_count * un_price;
  if (total <= 0) {
    total = 0;
  }
  console.log(final_count + "from desc");
  document.getElementById("quantity").value = final_count;
  document.getElementById("total").value = total;
}
function increase() {
  let temp = final_count;
  if (temp <= 0) {
    final_count = 0;
  }
  temp = count++;
  final_count = temp;
  total = final_count * un_price;
  console.log(final_count + "from inc");
  document.getElementById("quantity").value = final_count;
  document.getElementById("total").value = total;
}
