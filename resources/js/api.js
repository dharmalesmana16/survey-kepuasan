import axios from 'axios'
import './bootstrap'
import { grafikPie,grafikBar } from './app';
// async function getTotalAnswer(){
//     try{
//         let resp = axios.get('/api/layanan');
//         console.log(resp.data);
//     }catch(error){
//         console.log(error);
//     }
// }
// getTotalAnswer();
setTimeout(() => {
  

axios.get('/api/responden?startDate=today')
  .then((response) => {
    let totalJawaban = response.data;

    $('#ansToday').text(totalJawaban.data.length);
    // console.log(totalJawaban.data[0].jawaban)
    // grafikBar.series[0].setData([
    //     1,2,3,4,5
    // ]);
});
axios.get('/api/responden?grouping=yes')
  .then((response) => {
    let groupingJawaban = response.data;
  
    let dataGrouping=[];
    console.log(groupingJawaban);
    for(let i =0;i<groupingJawaban.data.length;i++){
      dataGrouping.push(groupingJawaban.data[i].totalGrouping)
    }
    console.log(dataGrouping)
    // $('#ansToday').text(totalJawaban.data.length);
    // // console.log(totalJawaban.data[0].jawaban)
    grafikBar.series[0].setData(
      dataGrouping
    );
    grafikPie.series[0].update({
      // name:["Sangat Puas","Puas","Cukup Puas","Kurang Puas","Buruk"],
      data: dataGrouping
  }, true);
   
});

}, 500);
const tanggal_mulai = {

  enableTime: true,
  time_24hr: true,
  defaultHour: '08',
  defaultMinute: '00',
  dateFormat: "Y-m-d H:i",

};

flatpickr('.tanggalAwal', tanggal_mulai);
const tanggal_akhir = {

  enableTime: true,
  time_24hr: true,
  defaultHour: '23',
  defaultMinute: '59',
  dateFormat: "Y-m-d H:i"
};

flatpickr('.tanggalAkhir', tanggal_akhir);
$(".search").submit(function(e) {
  e.preventDefault();
  // let tanggalAwal = $(".tanggalAwal").val();
  // console.log(tanggalAwal);
  let form = $(this);
  let serializedData = form.serialize();
  $.ajax({
      type: "GET",
      url: "/api/responden",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: serializedData,
      // dataType: "dataType",
      success: function(response) {
        console.log(response);
        let totalJawaban = response.data;
      $('#ansToday').text(totalJawaban.length);
          let groupingJawaban = response.grouping;
          let dataGrafik = []
          // console.log(groupingJawaban[0].totalGrouping)
          for(let i =0;i<groupingJawaban.length;i++){
            dataGrafik.push(groupingJawaban[i].totalGrouping)
          }
          
      }
  });
});
// console.log(totalJawaban);