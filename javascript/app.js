function removeDiv(divId) {
  var div = document.getElementById(divId);
  div.parentNode.removeChild(div);
}

function setActive(cur_id) {
  document.getElementById(cur_id).classList.add("active");
}

const getValueInput = (id) => {
  return document.getElementById(id).value;
};

const replaceUrlState = (product_id) => {
  console.log("reach");
  const path = "../includes/process-gr.php";
  const params = new URLSearchParams(location.search);
  params.set("qty", getValueInput("qty"));
  params.set("product_id", product_id);
  window.history.replaceState({}, "", `${path}?${params}`);
  location.reload();
};

const replaceUrlStatePurch = (product_id) => {
  console.log("reach");
  const path = "../includes/process-purch.php";
  const params = new URLSearchParams(location.search);
  params.set("qty", getValueInput("qty"));
  params.set("product_id", product_id);
  window.history.replaceState({}, "", `${path}?${params}`);
  location.reload();
};
