
// ****

  function showImageWindow(){
    document.getElementById('window_backframe').classList.remove('is-hidden');
    document.getElementById('new_image').classList.remove('image_hide');
    try{
      document.getElementById('new_genre').classList.add('genre_hide');
      document.getElementById('new_area').classList.add('area_hide');
    } catch {
      return;
    }
  }
  function showGenreWindow(){
    document.getElementById('window_backframe').classList.remove('is-hidden');
    document.getElementById('new_genre').classList.remove('genre_hide');
    try{
      document.getElementById('new_image').classList.add('image_hide');
      document.getElementById('new_area').classList.add('area_hide');
    } catch {
      return;
    }
  }
  function showAreaWindow(){
    document.getElementById('window_backframe').classList.remove('is-hidden');
    document.getElementById('new_area').classList.remove('area_hide');
    try{
      document.getElementById('new_image').classList.add('image_hide');
      document.getElementById('new_genre').classList.add('genre_hide');
    } catch {
      return;
    }
  }
  function hideWindow(){
    document.getElementById('window_backframe').classList.add('is-hidden');
    // document.getElementById('new_image').classList.add('image_hide');
    // document.getElementById('new_genre').classList.add('genre_hide');
    // document.getElementById('new_area').classList.add('area_hide');
  }