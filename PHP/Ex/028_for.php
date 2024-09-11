<?php

// for문 : 특정 처리를 반복적으로 구현하고자 할 때 사용하는 문법

// for(초기값; 조건식; 증감연산자) {
//     반복 하고 싶은 처리
// }

for($i = 0; $i < 3; $i++) {
    echo $i."번째 루프\n";
}
// 총 루프를 4번 하게 되고 $i에 따른 조건식의 값에 따라 결과가 true 또는
// false로 나옴
// $i의 값이 1씩 증가하게 되며 조건식이 3보다 작다고 나와있기 때문에
// $i의 값이 0에서 2까지이다.

// break문 : 처리 중 break문을 만나면 루프를 종료한다.
for($i = 0; $i < 5; $i++) {
    if($i === 3) {
        break;
    }
    echo $i."번쨰 루프\n";
}
// 루프 4번, for문과 비슷하지만 if문 처리가 생김
// $i의 값이 1씩 증가하며, 5보다 작기에 $i의 값은 0~4이다.
// 다만, break문이 있어 $i의 값이 3일 때 루프를 종료한다.

// continue문 : 처리 중 continue문을 만나면 
// 그 아래의 처리를 건너뛰고 다음 루프를 진행한다.
for($i = 0; $i < 5; $i++) {
    if($i === 3) {
        continue;
    }
    echo $i."번째 루프\n";
}
// 2번째 루프까지 출력되고 3번째 루프는 건너뛰고 다음 루프가 출력

// 다중 루프문 : 루프 안에 루프가 있는 형태
for($i = 1; $i < 3; $i++) {
    echo "바깥 LOOP문 : ".$i."\n";

    for($z = 1; $z < 3; $z++) {
        echo "안쪽 LOOP문 : ".$z."\n";
    }
}
// 바깥 루프문이 한 번 출력 되고 안쪽 루프문은 두 번 출력된다.


for($dan = 2; $dan <= 9; $dan++) {
    echo "**".$dan."단**\n";
    for($multi = 1; $multi <= 9; $multi++) {
        echo $dan." X ".$multi." = ".($dan * $multi)."\n";
    }
}

for($row = 1; $row <= 5; $row++ ) {
    echo "*****"."\n";
}

// $star = ["*"];
// $star_length = count($star);
// for ($i = 1; $i < $star_length; $i++) {
//     echo $star[$i];
// }

// 찾아본 코드
for($i = 0; $i < 6; $i++) {
    for($i1 = 0; $i1 < $i; $i1++) {
        echo "*";
    }
    echo "\n";
}

// 선생님 코드
for($i = 1; $i <= 5; $i++) {
    for($i1 = 1; $i1 <= $i; $i1++) {
        echo "*";
    }
    echo "\n";
}

// 선생님 코드 리버스
for($i = 1; $i <= 5; $i++) {
    for($i1 = 5; $i1 >= $i; $i1--) {
        echo "*";
    }
    echo "\n";
}

// 역삼각형
for($i = 1; $i <= 5; $i++) {
    for($i1 = 5; $i1 >= 0; $i1--) {
        if($i1 <= $i) {
            echo "*";
        } 
            else {
                echo " ";
        }
    }
    echo "\n";
}

$num = 5;
for($i = 1; $i <= $num; $i++) {
    for($z = $num; $z >= 0; $z--) {
        echo " ";
    }
    for($k = 1; $k <= $i; $k++) {
        echo "*";
    }      
    echo "\n";
} 

// 구구단 6단 - 시간제한 5분

for($dan = 6; $dan <= 6; $dan++) {
    echo $dan."단\n";
    for($multi = 1; $multi <= 9; $multi++) {
        echo $dan." X ".$multi." = ".($dan * $multi)."\n";
    }
}