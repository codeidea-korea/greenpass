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
