#include <stdio.h>

int converter_tempo_para_segundos(int horas, int minutos, int segundos) {
    return (horas * 3600) + (minutos * 60) + segundos;
}

int main() {
    int h, m, s;
    scanf("%d %d %d", &h, &m, &s);
    printf("%d\n", converter_tempo_para_segundos(h, m, s));
    return 0;
}
