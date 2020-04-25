package com.company;

import java.util.Scanner;

public class Kas {

    public int pilihan,y,z;
    int ratamasuk=0;
    int ratakeluar=0;
    int banyak=0;
    int banyak_out=0;
    int duit_out[]= new int[100];
    int duit[]= new int[100];


    public void menu(int pilihan,int saldo){


        Scanner keyboard = new Scanner(System.in);
        System.out.println("Catatan Keuangan");
        System.out.println("1.Pemasukan");
        System.out.println("2.Pengeluaran");
        System.out.println("3.Jumlah Saldo Sekarang");
        System.out.println("4.rata2 keluar /  masuk");
        System.out.println("5.keluar");
        System.out.println("Masukkan Pilihan : ");
        pilihan = keyboard.nextInt();

        if(pilihan==1){
            System.out.println("PEMASUKAN");
            System.out.println("Masukkan Jumlah saldo = ");
            z = keyboard.nextInt();
            System.out.println("Saldo Masuk = "+z);
            System.out.println("Saldo telah masuk");
            duit[banyak]=z;
            banyak++;
            saldo=saldo+z;

            System.out.println("total  Saldo saat ini =  "+saldo);
            menu(pilihan,saldo);
        }
        else if(pilihan==2){
            System.out.println("PENGELUARAN");
            System.out.println("Masukan Jumlah Pengeluaran = ");
            z = keyboard.nextInt();
            saldo=saldo-z;
            System.out.println("total saldo = "+saldo);
            duit_out[banyak_out]=z;
            banyak_out++;
            menu(pilihan,saldo);
        }
        else if(pilihan==3){
            System.out.println("SALDO");
            System.out.println("Saldo = "+saldo);
            menu(pilihan,saldo);
        }
        else if (pilihan==4){
            System.out.println(banyak);
            for(int i=0;i<=banyak;i++){
                ratamasuk=ratamasuk+duit[i];
            }
            for(int j=0;j<=banyak_out;j++){
                ratakeluar=ratakeluar+duit_out[j];
            }
            if (banyak==0){
                System.out.println("rata-rata pemasukan   = 0");
               // System.out.println("rata-rata pengeluaran = 0"+ratakeluar/banyak_out);
            } else {
                System.out.println("rata-rata pemasukan   = " + ratamasuk / banyak);
                //System.out.println("rata-rata pengeluaran = " + ratakeluar / banyak_out);
            }
            if (banyak_out==0){
                //System.out.println("rata-rata pemasukan   = 0"+ratamasuk/banyak);
                 System.out.println("rata-rata pengeluaran = 0");
            } else {
                //System.out.println("rata-rata pemasukan   = " + ratamasuk / banyak);
                System.out.println("rata-rata pengeluaran = " + ratakeluar / banyak_out);
            }
            menu(pilihan,saldo);
        }
        else if(pilihan==5){
            System.out.println("exit");
        }
        else {
            System.out.println();
            menu(pilihan,saldo);
        }

    }



}
