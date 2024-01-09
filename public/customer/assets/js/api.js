const Api = {
    Location: {},  
    Tour: {},
    Hotel: {},
    Room: {},
    Combo: {},
    Yacht: {},
    Blog: {},
    Message: {},
    Category: {},

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
        url: `/customer/apip/location/get`,
        method: 'GET',
    }); 
})();

//Tour
(() => {
    Api.Tour.GetAll = () => $.ajax({
        url: `/customer/apip/tour/get`,
        method: 'GET',
    }); 
    Api.Tour.GetTrending = () => $.ajax({
        url: `/customer/apip/tour/get-trending`,
        method: 'GET',
    }); 
    Api.Tour.GetOne = (id) => $.ajax({
        url: `/customer/apip/tour/get-one/${id}`,
        method: 'GET',
    }); 
    Api.Tour.GetTourNew = () => $.ajax({
        url: `/customer/apip/tour/get-new`,
        method: 'GET',
    });  
    Api.Tour.GetSearch = (data) => $.ajax({
        url: `/customer/apip/tour/get-search`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

//Hotel
(() => {
    Api.Hotel.GetOne = (id) => $.ajax({
        url: `/customer/apip/hotel/get-one/${id}`,
        method: 'GET',
    }); 
    Api.Hotel.GetHotelNew = () => $.ajax({
        url: `/customer/apip/hotel/get-new`,
        method: 'GET',
    }); 
})();

//Combo
(() => {
    Api.Combo.GetOne = (id) => $.ajax({
        url: `/customer/apip/combo/get-one/${id}`,
        method: 'GET',
    }); 
    Api.Combo.GetComboNew = () => $.ajax({
        url: `/customer/apip/combo/get-new`,
        method: 'GET',
    }); 
})();

//Yacht
(() => {
    Api.Yacht.GetOne = (id) => $.ajax({
        url: `/customer/apip/yacht/get-one/${id}`,
        method: 'GET',
    }); 
    Api.Yacht.GetYachtNew = () => $.ajax({
        url: `/customer/apip/yacht/get-new`,
        method: 'GET',
    }); 
})();

//Blog
(() => {
    Api.Blog.GetAll = (limit) => $.ajax({
        url: `/customer/apip/blog/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            limit: limit ?? '0',
        }
    }); 
})();

//Category
(() => {
    Api.Category.GetAll = (filter) => $.ajax({
        url: `/customer/apip/category/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            tab: filter.tab ?? '',
            page: filter.page ?? '',
            pageSize: filter.pageSize ?? '',
            budget: filter.budget ?? '',
            location_type: filter.location_type ?? '',
            sort: filter.sort ?? '',
        }
    }); 
})();

//Room
(() => {
    Api.Room.GetOne = (id) => $.ajax({
        url: `/customer/apip/room/get-one/${id}`,
        method: 'GET',
    }); 
    Api.Message.Sending = (data) => $.ajax({
        url: `/customer/apip/message/sending`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();


