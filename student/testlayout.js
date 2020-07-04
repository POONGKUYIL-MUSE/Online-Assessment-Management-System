var i = 0;
var correctCount = 0;

generate(0);

function generate(index) {
	document.getElementById("questionno").innerHTML = myJson[index].qno;
	document.getElementById("question").innerHTML = myJson[index].qn;
	document.getElementById("optt1").innerHTML = myJson[index].option1;
	document.getElementById("optt2").innerHTML = myJson[index].option2;
	document.getElementById("optt3").innerHTML = myJson[index].option3;
	document.getElementById("optt4").innerHTML = myJson[index].option4;

	document.getElementById('opt1').checked = false;
	document.getElementById('opt2').checked = false;
	document.getElementById('opt3').checked = false;
	document.getElementById('opt4').checked = false;
}

function checkAnswer() {
	if(document.getElementById('opt1').checked && myJson[i].option1 == myJson[i].answer){
		correctCount++;
	}
	if(document.getElementById('opt2').checked && myJson[i].option2 == myJson[i].answer){
		correctCount++;
	}
	if(document.getElementById('opt3').checked && myJson[i].option3 == myJson[i].answer){
		correctCount++;
	}
	if(document.getElementById('opt4').checked && myJson[i].option4 == myJson[i].answer){
		correctCount++;
	}

	//increment i for next qn
	i++;
	if(myJson.length-1 < i){
		var score = correctCount;
		//document.write("your score : "+correctCount);
		window.location.href="launchtest.php?scores="+score;
		//window.location.href="launchtest.php";
	}
	generate(i);
}