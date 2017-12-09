/**
 * Created by kobi.ktk on 12/3/17.
 */

//alert("hi");

function validate() {


    //var x = document.forms["pTender"]["tenderId"].value;

    if(document.pBidder.file1.value==""){
        alert("Bid File must be submitted");
        document.pBidder.file1.focus();
        return false;

    }

  //  confirm('Tender Id ='+ document.pTender.tenderId.value +'\n Bid Submision Date ='+ document.pTender.biddate.value +'\n Bid Submision Time ='+ document.pTender.bidtime.value + '\n Tender Opening Date & Time ='+document.pTender.topendt.value+ ' ' +document.pTender.topendd.value+'\n Organisation ='+ document.pTender.org.value +'\n \n Are Sure to Post it? ' );



    return(true);
}


function msg(){

    alert("Records Add Successfully");

}
