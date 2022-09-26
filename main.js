function getCatProducts($id) {
    const input = document.querySelector("#cat_id");
    const form = document.querySelector("#catPro");
    input.value = $id;
    form.submit();
  }
  
  function submitForm($id) {
    const input = document.querySelector("#Id_P");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
  }
  
  function deleteForm($id) {
    const input = document.querySelector("#delete_Id_P");
    const form = document.querySelector("#delete_form");
    input.value = $id;
    form.submit();
  }