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
$(document).ready(function () {
  
axios.get('/api/responden?startDate=today')
  .then((response) => {
    let totalJawaban = response.data;
    // let sangatPuas = totalJawaban.data;
    // console.log(sangatPuas)
    // let dataAns=[];
   
    $('#ansToday').text(totalJawaban.data.length);
    // console.log(totalJawaban.data[0].jawaban)
    grafikBar.series[0].setData([
        1,2,3,4,5
    ]);
});
axios.get('/api/responden?grouping=yes')
  .then((response) => {
    let groupingJawaban = response.data;
    // let sangatPuas = totalJawaban.data;
    // console.log(sangatPuas)
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
});

// console.log(totalJawaban);