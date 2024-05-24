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
  

axios.get('/api/responden?startDate=today')
  .then((response) => {
    let totalJawaban = response.data;
    let sumAnswer =0;
    let textTampilanAnswer ="";
    let totalAnswer = totalJawaban.data.length
    $('#ansToday').text(totalAnswer);
    console.log(totalJawaban.data);
    for(let i =0;i<totalJawaban.data.length;i++){
      sumAnswer = sumAnswer + totalJawaban.data[i].jawaban
    }
    
    let result = Math.round(sumAnswer/totalAnswer)
    if(result == 5){
      textTampilanAnswer = "Sangat Puas"
    }else if (result== 4){
      textTampilanAnswer = "Puas"
    }else if (result == 3){
      textTampilanAnswer = "Cukup Puas"
    }else if(result == 2){
      textTampilanAnswer = "Kurang Puas"
    }else{
      textTampilanAnswer = "Buruk"
    }
    $("#tampilanAnswer").attr("src",`/image/${result}.png`);
    $('#textTampilanAnswer').text(textTampilanAnswer);


});
axios.get('/api/responden?grouping=yes')
  .then((response) => {
    let groupingJawaban = response.data;
    let dataGrouping=[];
    let dataPieGrafic =[];
    let jawaban;
    
    for(let i =0;i<groupingJawaban.data.length;i++){
      let dataObj ={};
      let nameAnswer =groupingJawaban.data[i].jawaban
      if(nameAnswer == 5){
        nameAnswer = "Sangat Puas"
      }else if (nameAnswer== 4){
        nameAnswer = "Puas"
      }else if (nameAnswer == 3){
        nameAnswer = "Cukup Puas"
      }else if(nameAnswer == 2){
        nameAnswer = "Kurang Puas"
      }else{
        nameAnswer = "Buruk"
      }
      dataObj["name"]=nameAnswer;

      dataObj["y"]=groupingJawaban.data[i].totalGrouping;
      dataPieGrafic.push(dataObj);
    } 
    
    grafikBar.series[0].setData(
      dataPieGrafic
    );
    grafikPie.series[0].update({
      // name:["Sangat Puas","Puas","Cukup Puas","Kurang Puas","Buruk"],
      data: dataPieGrafic
  }, true);

   
});

const tanggal_mulai = {

  enableTime: true,
  time_24hr: true,
  defaultHour: '08',
  defaultMinute: '00',
  dateFormat: "Y-m-d H:i",

};
// diganti
flatpickr('.tanggalAwal', tanggal_mulai); //tambahan icon
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