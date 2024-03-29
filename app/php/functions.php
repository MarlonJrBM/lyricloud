<?php
//Helper Functions for Entire Application

define("STOPWORDS", "able,about,above,according,accordingly,across,actually,after,afterwards,again,against,ain't,all,allow,allows,almost,alone,along,already,also,although,always,am,among,amongst,an,and,another,any,anybody,anyhow,anyone,anything,anyway,anyways,anywhere,apart,appear,appreciate,appropriate,are,aren't,around,as,aside,ask,asking,associated,at,available,away,awfully,be,became,because,become,becomes,becoming,been,before,beforehand,behind,being,believe,below,beside,besides,best,better,between,beyond,both,brief,but,by,c'mon,c's,came,can,can't,cannot,cant,cause,causes,certain,certainly,changes,clearly,co,com,come,comes,concerning,consequently,consider,considering,contain,containing,contains,corresponding,could,couldn't,course,currently,definitely,described,despite,did,didn't,different,do,does,doesn't,doing,don't,done,down,downwards,during,each,edu,eg,eight,either,else,elsewhere,enough,entirely,especially,et,etc,even,ever,every,everybody,everyone,everything,everywhere,ex,exactly,example,except,far,few,fifth,first,five,followed,following,follows,for,former,formerly,forth,four,from,further,furthermore,get,gets,getting,given,gives,go,goes,going,gone,got,gotten,greetings,had,hadn't,happens,hardly,has,hasn't,have,haven't,having,he,he's,hello,help,hence,her,here,here's,hereafter,hereby,herein,hereupon,hers,herself,hi,him,himself,his,hither,hopefully,how,howbeit,however,i'd,i'll,i'm,i've,ie,if,ignored,immediate,in,inasmuch,inc,indeed,indicate,indicated,indicates,inner,insofar,instead,into,inward,is,isn't,it,it'd,it'll,it's,its,itself,just,keep,keeps,kept,know,knows,known,last,lately,later,latter,latterly,least,less,lest,let,let's,like,liked,likely,little,look,looking,looks,ltd,mainly,many,may,maybe,me,mean,meanwhile,merely,might,more,moreover,most,mostly,much,must,my,myself,name,namely,nd,near,nearly,necessary,need,needs,neither,never,nevertheless,new,next,nine,no,nobody,non,none,noone,nor,normally,not,nothing,novel,now,nowhere,obviously,of,off,often,oh,ok,okay,old,on,once,one,ones,only,onto,or,other,others,otherwise,ought,our,ours,ourselves,out,outside,over,overall,own,particular,particularly,per,perhaps,placed,please,plus,possible,presumably,probably,provides,que,quite,qv,rather,rd,re,really,reasonably,regarding,regardless,regards,relatively,respectively,right,said,same,saw,say,saying,says,second,secondly,see,seeing,seem,seemed,seeming,seems,seen,self,selves,sensible,sent,serious,seriously,seven,several,shall,she,should,shouldn't,since,six,so,some,somebody,somehow,someone,something,sometime,sometimes,somewhat,somewhere,soon,sorry,specified,specify,specifying,still,sub,such,sup,sure,t's,take,taken,tell,tends,th,than,thank,thanks,thanx,that,that's,thats,the,their,theirs,them,themselves,then,thence,there,there's,thereafter,thereby,therefore,therein,theres,thereupon,these,they,they'd,they'll,they're,they've,think,third,this,thorough,thoroughly,those,though,three,through,throughout,thru,thus,to,together,too,took,toward,towards,tried,tries,truly,try,trying,twice,two,un,under,unfortunately,unless,unlikely,until,unto,up,upon,us,use,used,useful,uses,using,usually,value,various,very,via,viz,vs,want,wants,was,wasn't,way,we,we'd,we'll,we're,we've,welcome,well,went,were,weren't,what,what's,whatever,when,whence,whenever,where,where's,whereafter,whereas,whereby,wherein,whereupon,wherever,whether,which,while,whither,who,who's,whoever,whole,whom,whose,why,will,willing,wish,with,within,without,won't,wonder,would,would've,wouldn't,yes,yet,you,you'd,you'll,you're,you've,your,yours,yourself,yourselves,zero,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,yeah");


// Filters out stop words when used with PHP's array_filter() function
function filterStopwords($word) {
	$stopwords = explode(",", STOPWORDS);
	return !in_array(strtolower($word), $stopwords, true);
}


// Filters out [chorus] and [verse] indicators found in some lyrics provided by the API
function filterLyrics($lyrics) {
	$pattern = "/\[.*(chorus|verse|hook|produced|bridge|).*\]/i";
	return preg_replace($pattern, "", $lyrics);
}

// Given a string creates a slug for it. EG: Given "Guns N' Roses" returns guns-n-roses
function createSlug($string) {
	$pattern = "/('*\s+|'+)/i";

	$slug = preg_replace($pattern, "-", $string);
	$slug = preg_replace("/-+/i", "-", $slug); //gets rid of tricky dashes

	return strtolower($slug);
}

// Compares word frequencies so that they can be sorted with uasort()
function compareFrequencies($freq1, $freq2) {
	if($freq1 == $freq2) {
		return 0;
	}
	return ($freq1 < $freq2) ? 1 : -1;
}

// Merges two word frequency lists and returns the result
function mergeFrequencyLists($oldList, $newList) {
	$frequencyList = !isset($oldList) ? array() : $oldList;

	if(is_array($newList)) {
		foreach($newList as $word => $frequency) {
			$word = strtolower($word);
			$frequencyList[$word] = array_key_exists($word, $frequencyList) ? ($frequencyList[$word] + $frequency) : $frequency;
		}
	}

	uasort($frequencyList, "compareFrequencies");

	return $frequencyList;
}

// Prints out an array in human-readable format (one key/value pair per line)
function printr($var) {
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}

?>