#include <stdio.h>

int main() {
    int joaoAge = 10;
    int mariaAge = 13;

    int joaoHeight = 121;
    int mariaHeight = 158;

    int joaoGain = 2;
    int mariaGain = 1;

    // Pq for e não while?
    for (int i = 0; i <= 100; i++) {
        if (joaoHeight < mariaHeight) {
            joaoHeight += joaoGain;
            mariaHeight += mariaGain;
        } else {
            printf("João é mais alto que Maria após %d anos\n", i + 1);
            break;
        }
    }
}