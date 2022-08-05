// ウィンドウ消去
function hideWindow(){
  document.getElementById('window_backframe').classList.add('is-hidden');
}
// 画像追加ウィンドウ
function showImageWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_image').classList.remove('image_hide');
  try{
    document.getElementById('new_genre').classList.add('genre_hide');
  } catch {
  }
  try{
    document.getElementById('new_area').classList.add('area_hide');
  } catch {
  }
}
// 売り場追加ウィンドウ
function showGenreWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_genre').classList.remove('genre_hide');
  try{
    document.getElementById('new_image').classList.add('image_hide');
  } catch {
  }
  try{
    document.getElementById('new_area').classList.add('area_hide');
  } catch {
  }
}
// 産地追加ウィンドウ
function showAreaWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_area').classList.remove('area_hide');
  try{
    document.getElementById('new_image').classList.add('image_hide');
  } catch {
  }
  try{
    document.getElementById('new_genre').classList.add('genre_hide');
  } catch {
  }
}
// 商品追加ウィンドウ
function showProductWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_product').classList.remove('product_hide');
}
// 売り場担当者追加ウィンドウ
function showManagerWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_manager').classList.remove('manager_hide');
  try{
    document.getElementById('new_email').classList.add('email_hide');
  } catch {
  }
}
// ユーザー追加ウィンドウ
function showUserWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_user').classList.remove('user_hide');
  try{
    document.getElementById('new_email').classList.add('email_hide');
  } catch {
  }
}
// Email追加ウィンドウ
function showEmailWindow(){
  document.getElementById('window_backframe').classList.remove('is-hidden');
  document.getElementById('new_email').classList.remove('email_hide');
  try {
    document.getElementById('new_manager').classList.add('manager_hide');
  } catch {
  }
  try {
    document.getElementById('new_user').classList.add('user_hide');
  } catch {
  }
}


// 評価コメント スター制御
function star_change(number,id){
  let my_star1=document.getElementById('my_star1' + id);
  let my_star2=document.getElementById('my_star2' + id);
  let my_star3=document.getElementById('my_star3' + id);
  let my_star4=document.getElementById('my_star4' + id);
  let my_star5=document.getElementById('my_star5' + id);
  let my_star = 0;
  switch (number){
    case 1:
      if(my_star2.classList.contains('star_on') == false ){
        my_star1.classList.toggle('star_on');
      }
      if(my_star1.classList.contains('star_on') == true ){
        my_star = 1;
      }else{
        my_star = 0;
      }
      my_star2.classList.remove('star_on');
      my_star3.classList.remove('star_on');
      my_star4.classList.remove('star_on');
      my_star5.classList.remove('star_on');
      break;
    case 2:
      if(my_star3.classList.contains('star_on') == false ){
        my_star2.classList.toggle('star_on');
      }
      if(my_star2.classList.contains('star_on') == true ){
        my_star1.classList.add('star_on');
        my_star = 2;
      }else{
        my_star = 1;
      }
      my_star3.classList.remove('star_on');
      my_star4.classList.remove('star_on');
      my_star5.classList.remove('star_on');
      break;
    case 3:
      if(my_star4.classList.contains('star_on') == false ){
        my_star3.classList.toggle('star_on');
      }
      if(my_star3.classList.contains('star_on') == true ){
        my_star1.classList.add('star_on');
        my_star2.classList.add('star_on');
        my_star = 3;
      }else{
        my_star = 2;
      }
      my_star4.classList.remove('star_on');
      my_star5.classList.remove('star_on');
      break;
    case 4:
      if(my_star5.classList.contains('star_on') == false ){
        my_star4.classList.toggle('star_on');
      }
      if(my_star4.classList.contains('star_on') == true ){
        my_star1.classList.add('star_on');
        my_star2.classList.add('star_on');
        my_star3.classList.add('star_on');
        my_star = 4;
      }else{
        my_star = 3;
      }
      my_star5.classList.remove('star_on');
      break;
    case 5:
      my_star5.classList.toggle('star_on');
      if(my_star5.classList.contains('star_on') == true ){
        my_star1.classList.add('star_on');
        my_star2.classList.add('star_on');
        my_star3.classList.add('star_on');
        my_star4.classList.add('star_on');
        my_star = 5;
      }else{
        my_star = 4;
      }
      break;
  }
  document.getElementById('my_star' + id).value = my_star;
}