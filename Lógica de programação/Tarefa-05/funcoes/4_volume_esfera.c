#include <stdio.h>
#include <math.h>

#define PI 3.141592645

double calcular_volume_esfera(double raio) {
    if (raio < 0) return 0.0;
    return (4.0 / 3.0) * PI * pow(raio, 3);
}

int main() {
    double r;
    scanf("%lf", &r);
    double volume = calcular_volume_esfera(r);
    printf("%.2f\n", volume);
    return 0;
}
