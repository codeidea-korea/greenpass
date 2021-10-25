DROP DATABASE IF EXISTS `greenpass`;
CREATE DATABASE `greenpass` DEFAULT character set utf8;
USE greenpass;

-- 사용자
create table user_info
(
    user_seqno bigint auto_increment
        primary key,
    user_birthday    int(8)      default 0,
    user_phone   varchar(20)      null,
    sns_kakao   varchar(200)      null,
    sns_naver   varchar(200)      null,
    sns_apple   varchar(200)      null,
    sns_google   varchar(200)      null,
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

create index user_info__index_1
    on user_info (user_phone);

-- 사용자
create table user_auth_hst
(
    user_auth_hst_seqno bigint auto_increment
        primary key,
    user_seqno    bigint      not null,
    partner_auth_seqno    bigint      not null,
    auth_type   varchar(1)      not null, -- G : GPS, B : 비콘, N : NFC

-- GPS 좌표
    location_x   varchar(200)      null,
    location_y   varchar(200)      null,

    location_name   varchar(200)      null,
    location_sub_name   varchar(200)      null,
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

-- 등록된 지점 리스트
create table partner_auth
(
    partner_auth_seqno bigint auto_increment
        primary key,
    admin_seqno    bigint      not null, -- 등록한 어드민 계정 식별자
    gps_used   varchar(1)      not null, -- Y: 1, N: 0
    beacon_used   varchar(1)      not null, -- Y: 1, N: 0
    nfc_used   varchar(1)      not null, -- Y: 1, N: 0

-- GPS 좌표
    location_x   varchar(200)      null,
    location_y   varchar(200)      null,

    location_name   varchar(200)      null,
    location_sub_name   varchar(200)      null,
    location_img   varchar(300)      null,
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.5434837','126.9726973', '라화방','숙대입구점', 'http://dev-codeidea.codeidea.io/img/28.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.9482584','126.9555159', '익산시청','관공서', 'http://dev-codeidea.codeidea.io/img/28.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.9482571','126.9401467', '대한통운','익산지점', 'http://dev-codeidea.codeidea.io/img/25.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.738089','127.031539', '의정부시청','관공서', 'http://dev-codeidea.codeidea.io/img/23.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.512006','127.126777', '메가미트','방이점', 'http://dev-codeidea.codeidea.io/img/04.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.4670177','126.8592949', '메가미트','고양점', 'http://dev-codeidea.codeidea.io/img/05.png');
insert into partner_auth (admin_seqno, gps_used, beacon_used, nfc_used, location_x, location_y, location_name, location_sub_name, location_img) values (1, 1,1,1, '37.4898891','127.4994115', '메가미트','양평점', 'http://dev-codeidea.codeidea.io/img/10.png');

-- alter table user_auth_hst add column partner_auth_seqno    bigint      not null;

-- 유저 즐겨찾기 지점 리스트
create table user_favorite
(
    user_favorite_seqno bigint auto_increment
        primary key,
    partner_auth_seqno    bigint      not null, -- 
    user_seqno    bigint      not null, -- 등록한 어드민 계정 식별자
    
    create_dt        datetime         default CURRENT_TIMESTAMP null,
    update_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;



-- 휴대폰 인증 이력, 번호
create table send_sms_auth_hst
(
    hst_seqno bigint auto_increment
        primary key,
    sender_phone    varchar(100)        null, -- 전송 전화번호
    receive_phone    varchar(100)        null, -- 수신 전화번호
    user_birthday    int(8)      default 0,
    auth_code    varchar(50)      null, -- 인증번호
    create_dt        datetime         default CURRENT_TIMESTAMP null
)
    character set utf16;

create index send_sms_auth_hst__index_1
    on send_sms_auth_hst (receive_phone, user_birthday);

-- 문자 연동 이력
create table if_send_sms_hst
(
    hst_seqno bigint auto_increment
        primary key,
    sms_id          int(11)        not null, -- 
    callee    varchar(15)        null, -- 
    result_code    varchar(10)        null, -- 
    result    varchar(10)        null, -- 
    success_code    int(11)      null,
    failed_code    int(11)      null,
    send_time    varchar(50)      null, -- 
    create_dt        datetime         default CURRENT_TIMESTAMP null
) character set utf16;
