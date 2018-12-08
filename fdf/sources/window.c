/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   window.c                                           :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 13:27:33 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/07 18:48:43 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_create_window(t_all *all)
{
	void	*mlx_ptr;
	void	*win_ptr;
	int		x;
	int		y;
	int		ex;
	int		ey;

	x = 0;
	y = 0;
	ex = 100;
	ey = 100;
	mlx_ptr = mlx_init();
	win_ptr = mlx_new_window(mlx_ptr, 500, 500, "fdf");
	while (y < all->map.height)
	{
		while (x < all->map.width)
		{
			mlx_pixel_put(mlx_ptr, win_ptr, (x + ex), (y + ey), 0xFFFFFF);
			x++;
			ex += 10;
		}
		x = 0;
		ex = 100;
		y++;
		ey += 10;
	}
	mlx_loop(mlx_ptr);
    return (0);
}