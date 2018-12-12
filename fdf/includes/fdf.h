/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   fdf.h                                              :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 15:37:46 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/11 19:36:19 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#ifndef FDF_H

# define FDF_H
# include "../libft/libft.h"
# include <fcntl.h>
# include <mlx.h>

typedef struct      s_map
{
    int             **tab;
    int             width;
    int             height;
}                   t_map;

typedef struct      s_win
{
    void            *mlx_ptr;
    void            *win_ptr;
}                   t_win;

typedef struct      s_bres
{
    int             i;
    int             x;
    int             y;
    int             xi;
    int             xf;
    int             yi;
    int             yf;
    int             dx;
    int             dy;
    int             xinc;
    int             yinc;
    int             cumul;
}                   t_bres;

typedef struct      s_all
{
    t_map           map;
    t_win           win;
    t_bres          bres;
}                   t_all;

t_all           *ft_check_map(int fd, t_all *all);
int             ft_create_window(t_all *all);
int             ft_bresenham(t_all *all);

#endif