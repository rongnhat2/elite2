const Api = {
    Location: {},  
    Tour: {},
    Hotel: {},
    Room: {},
    Position: {},
    Combo: {},
    Yacht: {},
    YachtRoom: {},
    News: {},

    Image: {},
    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();
 


//Location
(() => {
    Api.Location.GetAll = () => $.ajax({
        url: `/apip/location/get`,
        method: 'GET',
    }); 
    Api.Location.Store = (data) => $.ajax({
        url: `/apip/location/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Location.getOne = (id) => $.ajax({
        url: `/apip/location/get-one/${id}`,
        method: 'GET',
    });
    Api.Location.Update = (data) => $.ajax({
        url: `/apip/location/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Location.Delete = (id) => $.ajax({
        url: `/apip/location/delete/${id}`,
        method: 'GET',
    });
})();

//Tour
(() => {
    Api.Tour.GetAll = () => $.ajax({
        url: `/apip/tour/get`,
        method: 'GET',
    }); 
    Api.Tour.Store = (data) => $.ajax({
        url: `/apip/tour/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Tour.getOne = (id) => $.ajax({
        url: `/apip/tour/get-one/${id}`,
        method: 'GET',
    });
    Api.Tour.Update = (data) => $.ajax({
        url: `/apip/tour/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Tour.Delete = (id) => $.ajax({
        url: `/apip/tour/delete/${id}`,
        method: 'GET',
    });
    Api.Tour.Trending = (id) => $.ajax({
        url: `/apip/tour/update-trending`,
        method: 'PUT',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
})();

//Hotel
(() => {
    Api.Hotel.GetAll = () => $.ajax({
        url: `/apip/hotel/get`,
        method: 'GET',
    }); 
    Api.Hotel.Store = (data) => $.ajax({
        url: `/apip/hotel/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Hotel.getOne = (id) => $.ajax({
        url: `/apip/hotel/get-one/${id}`,
        method: 'GET',
    });
    Api.Hotel.Update = (data) => $.ajax({
        url: `/apip/hotel/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Hotel.Delete = (id) => $.ajax({
        url: `/apip/hotel/delete/${id}`,
        method: 'GET',
    });
    Api.Hotel.Trending = (id) => $.ajax({
        url: `/apip/hotel/update-trending`,
        method: 'PUT',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
})();

//Room
(() => {
    Api.Room.GetAll = (id) => $.ajax({
        url: `/apip/room/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '', 
        }
    }); 
    Api.Room.Store = (data) => $.ajax({
        url: `/apip/room/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Room.getOne = (id) => $.ajax({
        url: `/apip/room/get-one/${id}`,
        method: 'GET',
    });
    Api.Room.Update = (data) => $.ajax({
        url: `/apip/room/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Room.Delete = (id) => $.ajax({
        url: `/apip/room/delete/${id}`,
        method: 'GET',
    });
})();


//Position
(() => {
    Api.Position.GetAll = () => $.ajax({
        url: `/apip/position/get`,
        method: 'GET',
    }); 
    Api.Position.Store = (data) => $.ajax({
        url: `/apip/position/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Position.getOne = (id) => $.ajax({
        url: `/apip/position/get-one/${id}`,
        method: 'GET',
    });
    Api.Position.Update = (data) => $.ajax({
        url: `/apip/position/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Position.Delete = (id) => $.ajax({
        url: `/apip/position/delete/${id}`,
        method: 'GET',
    });
})();

//Combo
(() => {
    Api.Combo.GetAll = (id) => $.ajax({
        url: `/apip/combo/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '', 
        }
    }); 
    Api.Combo.Store = (data) => $.ajax({
        url: `/apip/combo/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Combo.getOne = (id) => $.ajax({
        url: `/apip/combo/get-one/${id}`,
        method: 'GET',
    });
    Api.Combo.Update = (data) => $.ajax({
        url: `/apip/combo/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Combo.Delete = (id) => $.ajax({
        url: `/apip/combo/delete/${id}`,
        method: 'GET',
    });
})();

// Yacht
(() => {
    Api.Yacht.GetAll = () => $.ajax({
        url: `/apip/yacht/get`,
        method: 'GET',
    }); 
    Api.Yacht.Store = (data) => $.ajax({
        url: `/apip/yacht/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Yacht.getOne = (id) => $.ajax({
        url: `/apip/yacht/get-one/${id}`,
        method: 'GET',
    });
    Api.Yacht.Update = (data) => $.ajax({
        url: `/apip/yacht/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Yacht.Delete = (id) => $.ajax({
        url: `/apip/yacht/delete/${id}`,
        method: 'GET',
    });
})();

// YachtRoom
(() => {
    Api.YachtRoom.GetAll = (id) => $.ajax({
        url: `/apip/yacht-room/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '', 
        }
    }); 
    Api.YachtRoom.Store = (data) => $.ajax({
        url: `/apip/yacht-room/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.YachtRoom.getOne = (id) => $.ajax({
        url: `/apip/yacht-room/get-one/${id}`,
        method: 'GET',
    });
    Api.YachtRoom.Update = (data) => $.ajax({
        url: `/apip/yacht-room/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.YachtRoom.Delete = (id) => $.ajax({
        url: `/apip/yacht-room/delete/${id}`,
        method: 'GET',
    });
})();

// News
(() => {
    Api.News.GetAll = () => $.ajax({
        url: `/apip/news/get`,
        method: 'GET',
    }); 
    Api.News.Store = (data) => $.ajax({
        url: `/apip/news/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.News.getOne = (id) => $.ajax({
        url: `/apip/news/get-one/${id}`,
        method: 'GET',
    });
    Api.News.Update = (data) => $.ajax({
        url: `/apip/news/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.News.Delete = (id) => $.ajax({
        url: `/apip/news/delete/${id}`,
        method: 'GET',
    });
})();




// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
