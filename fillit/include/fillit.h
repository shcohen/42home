/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fillit.h                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 19:55:11 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/20 22:12:17 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FILLIT_H

# define FILLIT_H
# include "../libft/libft.h"
# include <fcntl.h>
# define BUF_SIZE 555

typedef struct      s_tetris
{
    char            *tetris; // == contenu du maillon
    struct s_tetris *next;
}                   t_tetris;

int         main(int argc, char **argv);
int         ft_openfile(char* argv);
int         ft_closefile(int fd);
char        *ft_readfile(int fd);
void        ft_first_check(char *tetris);
void        ft_check_forme(char *tetris);
t_tetris    *ft_create_tetris(char *buf, t_tetris *first);


#endif